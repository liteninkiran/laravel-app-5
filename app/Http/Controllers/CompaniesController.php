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
        $companies = Company::all();
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
            'postcode'       => '',
            'phone'          => '',
            'url'            => 'url|nullable'
        ]);

        // Store post
        auth()->user()->companies()->create($data);

        // Redirect to index
        return redirect(route('company.index'));
    }

    public function show($company)
    {
        echo "Show";
        //return view('company');
    }

    public function edit($company)
    {
        echo "Edit";
        //return view('company');
    }

    public function destroy($company)
    {
        echo "Destroy";
        //return view('company');
    }    
}
