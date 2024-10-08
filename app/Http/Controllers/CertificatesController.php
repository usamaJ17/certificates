<?php

namespace App\Http\Controllers;

use App\Imports\CertificatesImport;
use App\Models\Certificate;
use App\Models\CertificateFields;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;

class CertificatesController extends Controller
{
    public function index()
    {
        $certficates = Certificate::all();
        return view('certificates.index', compact('certficates'));
    }
    public function leaderBoard(){
        $certficates = Certificate::orderBy('score', 'desc')->limit(10)->get();
        return view('certificates.leaderboard', compact('certficates'));
    }
    public function importForm()
    {
        return view('certificates.importForm');
    }
    public function publicView($code)
    {
        $certificate = Certificate::where('code', $code)->first();
        if($certificate == null){
            abort(404);
        }
        $newFolderPath = storage_path('app/public/certificate/image'); // Path to the new folder in storage/app/public
        $filePath = $newFolderPath . '/' . $code . '.png';
        if (!file_exists($newFolderPath)) {
            mkdir($newFolderPath, 0755, true);
        }
        $image = '';
        if (file_exists($filePath)) {
            $image = asset('storage/certificate/image/' . $code . '.png'); // URL path for the new folder
        } else {
            Browsershot::url('https://certificate.efs-me.com/certificates/template/6110633972')
                ->windowSize(1920, 1080)
                ->save($filePath);
            $image = asset('storage/certificate/image/' . $code . '.png'); // URL path for the new folder
        }
        dd($image);
        return view('certificates.view', compact('certificate', 'image'));
    }
    public function generateTemplate($code)
    {
        $certificate = Certificate::where('code', $code)->first();
        $image = 'images/blank.jpg';
        if ($certificate->score >= 75 && $certificate->score <= 79) {
            $image = 'images/silver.jpg';
        } elseif ($certificate->score >= 80 && $certificate->score <= 84) {
            $image = 'images/gold.jpg';
        } elseif ($certificate->score >= 85 && $certificate->score <= 100) {
            $image = 'images/platinum.jpg';
        }
        return view('certificates.export', compact('certificate', 'image'));
    }

    public function importData(Request $request)
    {
        Excel::import(new CertificatesImport($request->name, $request->year), request()->file('excel'));

        return redirect()->route('admin.certificates.view')->with('success', 'All good!');
    }
    public function create()
    {
        return view('certificates.create');
    }
    public function certForm()
    {
        return view('certificates.form');
    }
    public function editCert($code){
        $certificate = Certificate::with('fields')->where('code', $code)->first();
        return view('certificates.edit', compact('certificate'));
    }
    
    public function certVerify(Request $request)
    {
        $cert = Certificate::where('code', $request->code)->first();
        if (!$cert) {
            $data = [
                'found' => false,
            ];
        } else {
            $data = [
                'found' => true,
            ];
        }
        return response()->json($data);
    }
    public function store(Request $request)
    {
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
                    'score' => $mark_value,
                ]);
            }
        }
        return redirect()->route('admin.certificates.view')->with('success', 'Certificate created successfully');
    }

    public function update(Request $request){
        $certificate = Certificate::find($request->cert_id);
        if($certificate){
            $certificate->update($request->all());
            CertificateFields::where('certificate_id', $request->cert_id)->delete();
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'mark_') === 0) {
                    $index = substr($key, 5); // Get the index from the key (e.g., '2' from 'mark_2')
                    $mark = $value;
                    $mark_value = $request->input('value_' . $index);
    
                    // Create the CertificateField
                    CertificateFields::create([
                        'certificate_id' => $certificate->id,
                        'name' => $mark,
                        'score' => $mark_value,
                    ]);
                }
            }
        }
        return redirect()->route('admin.certificates.view')->with('success', 'Certificate created successfully');
    }
    public function generateTenDigitNumber()
    {
        $randomPart = str_pad(rand(1, 9999999), 7, "0", STR_PAD_LEFT);
        $timestampPart = substr(time(), -3);
        return $timestampPart . $randomPart;
    }
    public function getData()
    {
        $certificates = Certificate::select(['id', 'code', 'name', 'employee_id', 'score', 'email', 'created_at'])->get();
        return response()->json(['data' => $certificates]);
    }
    public function deleteCert($id)
    {
        $certificate = Certificate::find($id);
        if ($certificate) {
            if ($certificate->delete()) {
                $data = [
                    'success' => true,
                    'message' => 'Certificate deleted successfully'
                ];
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Error in deleting certificate'
                ];
            }
        } else {
            $data = [
                'success' => false,
                'message' => 'Certificate not found'
            ];
        }
        return response()->json($data);
    }
}
