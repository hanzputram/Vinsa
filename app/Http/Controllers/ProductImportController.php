<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

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
            $import = new ProductsImport;
            Excel::import($import, $request->file('file'));

            $messages = [];
            if ($import->created > 0) {
                $messages[] = "{$import->created} product(s) created";
            }
            if ($import->updated > 0) {
                $messages[] = "{$import->updated} product(s) updated";
            }
            if ($import->skipped > 0) {
                $messages[] = "{$import->skipped} row(s) skipped (empty kode/name)";
            }

            $summary = implode(', ', $messages) ?: 'No rows processed';

            if (!empty($import->errors)) {
                $errorSummary = implode("\n", $import->errors);
                Log::error("ProductImport errors:\n" . $errorSummary);
                Alert::warning('Partial Import', $summary . '. Errors: ' . implode('; ', array_slice($import->errors, 0, 3)));
            } else {
                Alert::success('Success', $summary);
            }

            Log::info("ProductImport completed: created={$import->created}, updated={$import->updated}, skipped={$import->skipped}");

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorMessages = [];
            foreach ($failures as $failure) {
                $errorMessages[] = "Row {$failure->row()}: {$failure->attribute()} - " . implode(', ', $failure->errors());
            }
            Log::error('ProductImport validation error: ' . implode('; ', $errorMessages));
            Alert::error('Validation Error', implode('; ', array_slice($errorMessages, 0, 3)));
        } catch (\Exception $e) {
            Log::error('ProductImport exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
            Alert::error('Error', 'An error occurred: ' . $e->getMessage());
        }

        return back();
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products_template.xlsx');
    }
}
