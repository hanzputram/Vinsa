<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAtribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('attributes');

        if ($request->has('search') && $request->search !== null) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('kode', 'like', "%{$searchTerm}%");
            });
        }

        $products = $query->get();
        $categories = Category::all();

        return view('product', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('attributes')->findOrFail($id);
        return view('detailproduct', compact('product'));
    }

    public function view()
    {
        $categories = Category::all();
        return view('product-input', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer|min:0',
            'kode' => 'required|string|unique:products,kode',
            'category_id' => 'required|exists:categories,id',
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                function ($attribute, $value, $fail) {
                    if ($value->isValid()) {
                        $dimensions = getimagesize($value);
                        $ratio = $dimensions[0] / $dimensions[1];
                        if (abs($ratio - (8 / 11)) > 0.01) {
                            $fail('Gambar harus memiliki rasio 8:11.');
                        }
                    }
                }
            ],
            'specifications' => 'nullable|array',
            'specifications.*.field_name' => 'nullable|string',
            'specifications.*.field_value' => 'nullable|string',
        ]);

        foreach ($request->specifications ?? [] as $index => $spec) {
            if (!empty($spec['field_name']) && empty($spec['field_value'])) {
                return back()->withErrors([
                    "specifications.$index.field_value" => "Field value dibutuhkan jika field name diisi.",
                ])->withInput();
            }

            if (empty($spec['field_name']) && !empty($spec['field_value'])) {
                return back()->withErrors([
                    "specifications.$index.field_name" => "Field name dibutuhkan jika field value diisi.",
                ])->withInput();
            }
        }

        // Ambil custom input dari field dinamis
        $customInput = null;
        $customInputFields = ['push_button_type', 'selector_switch_type', 'pilot_lamp_type', 'uc_series'];
        foreach ($customInputFields as $field) {
            if ($request->has($field)) {
                $customInput = $request->input($field);
                break;
            }
        }

        $imagePath = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'kode' => $request->kode,
            'category_id' => $request->category_id,
            'custom_input' => $customInput, // ← Masukkan di sini
            'image' => $imagePath,
        ]);

        if ($request->has('specifications')) {
            foreach ($request->specifications as $spec) {
                if (!empty($spec['field_name']) && !empty($spec['field_value'])) {
                    ProductAtribute::create([
                        'product_id' => $product->id,
                        'field_name' => $spec['field_name'],
                        'field_value' => $spec['field_value'],
                    ]);
                }
            }
        }

        auth()->user()->histories()->create([
            'action' => 'create',
            'entity_type' => 'product',
            'entity_id' => $product->id,
            'description' => auth()->user()->name . ' menambahkan produk baru: ' . $product->name,
        ]);

        return redirect()->route('products.view', $product->id)->with('success', 'Produk berhasil ditambahkan!');
    }




    public function edit()
    {
        $products = Product::with('attributes')->get();
        return view('editProductView', compact('products'));
    }

    public function editView($id)
    {
        $product = Product::with('attributes')->findOrFail($id);
        $categories = Category::all();
        return view('update-product', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer|min:0',
            'kode' => 'required|string|unique:products,kode,' . $id,
            'category_id' => 'required|exists:categories,id',
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                function ($attribute, $value, $fail) {
                    if ($value->isValid()) {
                        $dimensions = getimagesize($value);
                        $ratio = $dimensions[0] / $dimensions[1];
                        if (abs($ratio - (8 / 11)) > 0.01) {
                            $fail('Gambar harus memiliki rasio 8:11.');
                        }
                    }
                }
            ],
            'specifications' => 'nullable|array',
            'specifications.*.field_name' => 'required_with:specifications.*.field_value',
            'specifications.*.field_value' => 'required_with:specifications.*.field_name',
        ]);

        $product = Product::findOrFail($id);
        $historyChanges = [];

        if ($product->name !== $request->name) {
            $historyChanges[] = 'nama dari "' . $product->name . '" menjadi "' . $request->name . '"';
            $product->name = $request->name;
        }

        if ($product->description !== $request->description) {
            $old = $product->description ?? '(kosong)';
            $new = $request->description ?? '(kosong)';
            $historyChanges[] = 'deskripsi dari "' . $old . '" menjadi "' . $new . '"';
            $product->description = $request->description;
        }

        if ($product->stock != $request->stock) {
            $historyChanges[] = 'stok dari "' . $product->stock . '" menjadi "' . $request->stock . '"';
            $product->stock = $request->stock;
        }

        if ($product->kode !== $request->kode) {
            $historyChanges[] = 'kode dari "' . $product->kode . '" menjadi "' . $request->kode . '"';
            $product->kode = $request->kode;
        }

        if ($product->category_id !== $request->category_id) {
            $oldCategoryName = $product->category ? $product->category->name : '(kategori dihapus)';
            $newCategoryName = Category::find($request->category_id)->name;
            $historyChanges[] = 'kategori dari "' . $oldCategoryName . '" menjadi "' . $newCategoryName . '"';
            $product->category_id = $request->category_id;
        }

        // Ambil langsung custom_input dari request
        $customInput = $request->custom_input;

        if ($product->custom_input !== $customInput) {
            $oldCustom = $product->custom_input ?? '(kosong)';
            $newCustom = $customInput ?? '(kosong)';
            $historyChanges[] = 'custom input dari "' . $oldCustom . '" menjadi "' . $newCustom . '"';
            $product->custom_input = $customInput;
        }

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('products', 'public');
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $newImagePath;
            $historyChanges[] = 'gambar produk telah diperbarui';
        }

        $product->save();

        // Update spesifikasi
        $product->attributes()->delete();
        $hasSpec = false;
        if ($request->has('specifications')) {
            foreach ($request->specifications as $spec) {
                if (!empty($spec['field_name']) || !empty($spec['field_value'])) {
                    ProductAtribute::create([
                        'product_id' => $product->id,
                        'field_name' => $spec['field_name'],
                        'field_value' => $spec['field_value'],
                    ]);
                    $hasSpec = true;
                }
            }
        }

        if ($hasSpec) {
            $historyChanges[] = 'spesifikasi telah diperbarui';
        }

        if (!empty($historyChanges)) {
            auth()->user()->histories()->create([
                'action' => 'update',
                'entity_type' => 'product',
                'entity_id' => $product->id,
                'description' => auth()->user()->name . ' memperbarui produk "' . $product->name . '" dengan perubahan: ' . implode(', ', $historyChanges),
            ]);
        }

        // dd($request->all());
        return redirect()->route('products.edit')->with('success', 'Produk berhasil diperbarui!');
    }




    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $productName = $product->name;

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->attributes()->delete();
        $product->delete();

        auth()->user()->histories()->create([
            'action' => 'delete',
            'entity_type' => 'product',
            'entity_id' => $id,
            'description' => auth()->user()->name . ' menghapus produk: ' . $productName,
        ]);

        return redirect()->route('products.edit')->with('success', 'Produk berhasil dihapus.');
    }
}
