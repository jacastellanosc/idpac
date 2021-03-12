<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $employees = Employee::all();

        $filter_name = $request->filter_name;
        $filter_company = $request->filter_company;
        $employees = array();
        if(empty($filter_name) && empty($filter_company)) {
            $employees = Employee::all();
        } else {
            $r = Employee::query();
            if(!empty($filter_name)) {
                $r->where('name', 'LIKE', '%' . $filter_name . '%')->orWhere('lastname', 'LIKE', '%' . $filter_name . '%');
            }
            if(!empty($filter_company)) {
                $r->where('company_id', '=', $filter_company);
            }
            $employees = $r->get();
        }
        $companies = Company::all();
        return view('employees')
            ->with('employees', $employees)
            ->with('companies', $companies)
            ->with('filter_name', $filter_name)
            ->with('filter_company', $filter_company);;
    }

    public function edit(Request $request)
    {
        $employee = Employee::where('id', '=', $request->employeeId)->first();
        $companies = Company::all();
        return view('employees-edit')
            ->with('employee', $employee)
            ->with('companies', $companies);
    }

    public function store(Request $request)
    {
        $employee = null;
        if($request->id != 0) {
            $employee = Employee::where('id', $request->id)->first();
        } else {
            $employee = new Employee();
        }

        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->company_id = $request->company_id;
        $employee->cellphone = $request->cellphone;
        $employee->save();

        return redirect(route('employees'));
    }

    public function delete(Request $request)
    {
        Employee::where('id', $request->employeeId)->delete();
        return redirect(route('employees'));
    }
}
