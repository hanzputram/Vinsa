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

public function show($param)
{
    $product = Product::with('attributes', 'category')
        ->where('slug', $param)
        ->orWhere('id', $param)
        ->firstOrFail();

    // Kalau akses pakai ID, redirect ke slug
    if ((string)$product->id === (string)$param) {
        return redirect()
            ->route('product.show', $product->slug)
            ->setStatusCode(301);
    }

    $barangs = Product::with('attributes')->get();

    return view('detailproduct', [
        'product' => $product,
        'barangs' => $barangs,
        'kodeAktif' => strtoupper($product->kode),
    ]);
}



    public function view()
    {
        $categories = Category::with('products')->get();
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
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',

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
            'datasheet' => 'nullable|file|mimes:pdf|max:10240', // max 10MB PDF
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

        $customInput = null;

        $category = Category::find($request->category_id);
        // dd($request->all());

        if ($category) {
            $categoryName = strtolower($category->name);

            if ($categoryName === 'push button') {
                $type = $request->input('push_button_type');
                $series = $request->input('push_button_series');
                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } elseif ($categoryName === 'selector switch') {
                $type = $request->input('selector_switch_type');
                $series = $request->input('selector_switch_series');

                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } elseif ($categoryName === 'cable lug') {
                $type = $request->input('cable_lug_type');
                $series = $request->input('cable_lug_series');
                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } elseif ($categoryName === 'mccb') {
                $type = $request->input('mccb_type');
                $series = $request->input('mccb_series');
                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } elseif ($categoryName === 'mccb accessories') {
                $type = $request->input('mccb_accessories_type');
                $series = $request->input('mccb_accessories_series');
                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } elseif ($categoryName === 'contactor accessories') {
                $type = $request->input('contactor_accessories_type');
                $series = $request->input('contactor_accessories_series');
                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } elseif ($categoryName === 'cable lug') {
                $type = $request->input('cable_lug_type');
                $series = $request->input('cable_lug_series');
                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } elseif ($categoryName === 'terminal block') {
                $type = $request->input('terminal_block_type');
                $series = $request->input('terminal_block_series');
                $customInput = json_encode([
                    'tipe' => $type,
                    'series' => $series,
                ]);
            } else {
                $customInputFields = [
                    'pilot_lamp_type',
                    'uc_series',
                    'accessories_type',
                ];

                foreach ($customInputFields as $field) {
                    if ($request->has($field)) {
                        $customInput = json_encode([
                            'value' => $request->input($field),
                        ]);
                        break;
                    }
                }
            }
        }

        $imagePath = $request->file('image')->store('products', 'public');

        $datasheetPath = null;
        if ($request->hasFile('datasheet')) {
            $datasheetPath = $request->file('datasheet')->store('datasheets', 'public');
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'kode' => $request->kode,
            'category_id' => $request->category_id,
            'custom_input' => $customInput,
            'image' => $imagePath,
            'datasheet' => $datasheetPath,

            // ✅ META (langsung simpan, nullable)
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
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

            // ✅ META (AMAN: nullable)
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',

            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                function ($attribute, $value, $fail) {
                    if ($value && $value->isValid()) {
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
            'datasheet' => 'nullable|file|mimes:pdf|max:10240', // max 10MB PDF
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

        // Ambil langsung custom_input dari request (sudah digabung dari form)
        $customInput = $request->input('custom_input');

        if ($product->custom_input !== $customInput) {
            $oldCustom = $product->custom_input ?? '(kosong)';
            $newCustom = $customInput ?? '(kosong)';
            $historyChanges[] = 'custom input dari "' . $oldCustom . '" menjadi "' . $newCustom . '"';
            $product->custom_input = $customInput;
        }

        // ✅ META CHANGES
        if ($product->meta_title !== $request->meta_title) {
            $old = $product->meta_title ?? '(kosong)';
            $new = $request->meta_title ?? '(kosong)';
            $historyChanges[] = 'meta title dari "' . $old . '" menjadi "' . $new . '"';
            $product->meta_title = $request->meta_title;
        }

        if ($product->meta_description !== $request->meta_description) {
            $old = $product->meta_description ?? '(kosong)';
            $new = $request->meta_description ?? '(kosong)';
            $historyChanges[] = 'meta description dari "' . $old . '" menjadi "' . $new . '"';
            $product->meta_description = $request->meta_description;
        }

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('products', 'public');
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $newImagePath;
            $historyChanges[] = 'gambar produk telah diperbarui';
        }

        if ($request->hasFile('datasheet')) {
            $newDatasheetPath = $request->file('datasheet')->store('datasheets', 'public');
            if ($product->datasheet && Storage::disk('public')->exists($product->datasheet)) {
                Storage::disk('public')->delete($product->datasheet);
            }
            $product->datasheet = $newDatasheetPath;
            $historyChanges[] = 'datasheet produk telah diperbarui';
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
