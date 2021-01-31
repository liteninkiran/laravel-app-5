<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = config('pagination.recordsPerPage');
        $companies = Company::orderBy('company_name')->paginate($page);
        $showFilter = false;
        $companyName = null;

        return view('companies.index', compact('companies', 'showFilter', 'companyName'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        // Store request data
        $data = $request->validate(
        [
            'company_name'   => 'required',
            'address_line_1' => '',
            'address_line_2' => '',
            'address_line_3' => '',
            'address_line_4' => '',
            'address_line_5' => '',
            'post_code'      => '',
            'phone'          => '',
            'url'            => 'url|nullable'
        ]);

        // Store data
        auth()->user()->companies()->create($data);

        // Redirect to index
        return redirect(route('company.index'));
    }

    public function show(Company $company)
    {
        echo "Show";
        //return view('company');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // Store request data
        $data = $request->validate(
        [
            'company_name'   => 'required',
            'address_line_1' => '',
            'address_line_2' => '',
            'address_line_3' => '',
            'address_line_4' => '',
            'address_line_5' => '',
            'post_code'      => '',
            'phone'          => '',
            'url'            => 'url|nullable'
        ]);

        // Store data
        $company->update($data);

        // Redirect to index
        return redirect(route('company.index'));
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return back();
    }    
}
