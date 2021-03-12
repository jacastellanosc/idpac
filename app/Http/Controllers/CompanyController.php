<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
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
        $filter_name = $request->filter_name;
        $companies = array();
        if(empty($filter_name)) {
            $companies = Company::all();
        } else {
            $companies = Company::query()->where('name', 'LIKE', '%' . $filter_name . '%')->get();
        }

        return view('companies')->with('companies', $companies)->with('filter_name', $filter_name);
    }

    public function edit(Request $request)
    {
        $company = Company::where('id', '=', $request->companyId)->first();
        return view('companies-edit')->with('company', $company);
    }

    public function store(Request $request)
    {
        $company = null;
        if($request->id != 0) {
            $company = Company::where('id', $request->id)->first();
        } else {
            $company = new Company();
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        if(!empty($request->logo)) {
            $path = 'public/' . md5($company->id) . '.' . $request->logo->extension();
            Storage::disk('local')->put($path, file_get_contents($request->logo->path()));
            $company->logo = $_SERVER['HTTP_ORIGIN'] . '/storage' . str_replace('public', '', $path);
            $company->save();
        }

        return redirect(route('companies'));
    }

    public function delete(Request $request)
    {
        Company::where('id', $request->companyId)->delete();
        return redirect(route('companies'));
    }
}
