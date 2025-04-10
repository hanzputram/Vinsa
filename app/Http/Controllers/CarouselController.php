<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function create()
    {
        return view('input-carousel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpeg,jpg,png,gif',
                function ($attribute, $value, $fail) {
                    if ($value->isValid()) {
                        $dimensions = getimagesize($value);
                        $width = $dimensions[0];
                        $height = $dimensions[1];
                        $ratio = $width / $height;
                        $targetRatio = 14 / 3;

                        if (abs($ratio - $targetRatio) > 0.01) {
                            $fail('Gambar harus memiliki rasio 14:3.');
                        }
                    }
                }
            ]
        ]);

        $imagePath = $request->file('image')->store('carousel', 'public');

        $carousel = Carousel::create([
            'image' => $imagePath,
        ]);

        auth()->user()->histories()->create([
            'action' => 'create',
            'entity_type' => 'carousel',
            'entity_id' => $carousel->id,
            'description' => ' menambahkan gambar ke banner dengan ID: ' . $carousel->id,
        ]);

        return redirect()->route('carousels.index')->with('success', 'Gambar berhasil ditambahkan ke banner!');
    }

    public function index()
    {
        $carousels = Carousel::all();
        return view('editCarouselView', compact('carousels'));
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('updateViewCarousel', compact('carousel'));
    }

    public function update(Request $request, $id)
    {
        $carousel = Carousel::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            [$width, $height] = getimagesize($image);

            if ($width != 2800 || $height != 600) {
                return redirect()->back()->with('error', 'Gambar harus berukuran tepat 2800x600 piksel.');
            }

            Storage::disk('public')->delete($carousel->image);

            $imagePath = $image->store('carousel', 'public');
            $carousel->update(['image' => $imagePath]);

            auth()->user()->histories()->create([
                'action' => 'update',
                'entity_type' => 'carousel',
                'entity_id' => $carousel->id,
                'description' => ' memperbarui gambar banner dengan ID: ' . $carousel->id,
            ]);

            return redirect()->back()->with('success', 'Gambar banner berhasil diperbarui!');
        }

        return redirect()->back()->with('info', 'Tidak ada gambar yang diperbarui.');
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);

        Storage::disk('public')->delete($carousel->image);

        $carousel->delete();

        auth()->user()->histories()->create([
            'action' => 'delete',
            'entity_type' => 'carousel',
            'entity_id' => $id,
            'description' => ' menghapus gambar banner dengan ID: ' . $id,
        ]);

        return redirect()->route('carousels.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
