<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::with('category')->get();
    }

    public function headings(): array
    {
        return [
            'kode',
            'name',
            'description',
            'stock',
            'category',
            'meta_title',
            'meta_description',
            'image',
        ];
    }

    /**
    * @var Product $product
    */
    public function map($product): array
    {
        return [
            $product->kode,
            $product->name,
            $product->description,
            $product->stock,
            $product->category ? $product->category->name : '',
            $product->meta_title,
            $product->meta_description,
            $product->image,
        ];
    }
}

