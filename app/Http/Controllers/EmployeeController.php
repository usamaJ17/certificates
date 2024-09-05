<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function employeeData(){
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }
    public function importEmployeeForm(){
        return view('employee.importForm');
    }
    public function importEmployeeData(Request $request){
        Excel::import(new EmployeeImport, request()->file('excel'));
        return redirect()->route('admin.employee')->with('success', 'All good!');
    }
}
