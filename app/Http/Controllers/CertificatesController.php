<?php

namespace App\Http\Controllers;

use App\Imports\CertificatesImport;
use App\Models\Certificate;
use App\Models\CertificateFields;
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
        Excel::import(new CertificatesImport($request->name,$request->year), request()->file('excel'));
        
        return redirect()->route('admin.certificates.view')->with('success', 'All good!');
    }
    public function create(){
        return view('certificates.create');
    }
    public function store(Request $request){
        $request->merge(['code' => $this->generateTenDigitNumber()]);
        $certificate = Certificate::create($request->all());
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'mark_') === 0) {
                $index = substr($key, 5); // Get the index from the key (e.g., '2' from 'mark_2')
                $mark = $value;
                $mark_value = $request->input('value_' . $index);
        
                // Create the CertificateField
                CertificateFields::create([
                    'certificate_id' => $certificate->id,
                    'name' => $mark,
                    'value' => $mark_value,
                ]);
            }
        }
        return redirect()->route('admin.certificates.view')->with('success', 'Certificate created successfully');
    }
    public function generateTenDigitNumber() {
        $randomPart = str_pad(rand(1, 9999999), 7, "0", STR_PAD_LEFT);
        $timestampPart = substr(time(), -3);
        return $timestampPart . $randomPart;
    }
}
