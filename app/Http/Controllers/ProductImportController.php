<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ProductImportController extends Controller
{
    public function index()
    {
        return view('product-import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new ProductsImport, $request->file('file'));
            Alert::success('Berhasil', 'Produk berhasil di-upload/update.');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return back();
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products_template.xlsx');
    }
}

