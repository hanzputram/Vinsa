<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAtribute;
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

        return view('product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('attributes')->findOrFail($id);
        return view('detailProduct', compact('product'));
    }

    public function view()
    {
        return view('product-input');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer|min:0',
            'kode' => 'required|string|unique:products,kode',
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

        $imagePath = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'kode' => $request->kode,
            'image' => $imagePath,
        ]);

        if ($request->has('specifications')) {
            foreach ($request->specifications as $spec) {
                if (!empty($spec['field_name']) || !empty($spec['field_value'])) {
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

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit()
    {
        $products = Product::with('attributes')->get();
        return view('editProductView', compact('products'));
    }

    public function editView($id)
    {
        $product = Product::with('attributes')->findOrFail($id);
        return view('update-product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer|min:0',
            'kode' => 'required|string|unique:products,kode,' . $id,
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

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('products', 'public');
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $newImagePath;
            $historyChanges[] = 'gambar produk telah diperbarui';
        }

        $product->save();

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
