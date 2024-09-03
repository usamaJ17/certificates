<?php

namespace App\Http\Controllers;

use App\Imports\CertificatesImport;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CertificatesController extends Controller
{
    public function index(){
        $certficates = Certificate::all();
        return view('certificates.index', compact('certficates'));
    }
    public function importForm()
    {
        return view('certificates.importForm');
    }
    public function importData(Request $request){
        // $request->validate([
        //     'excel' => 'required|mimes:xls,xlsx'
        // ]);

        // dd(request()->file('excel'));
        Excel::import(new CertificatesImport, request()->file('excel'));
        
        return redirect()->route('admin.certificates.view')->with('success', 'All good!');
    }
}
