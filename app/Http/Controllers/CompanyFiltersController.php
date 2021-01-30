<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyFiltersController extends Controller
{
    public function index(Request $request)
    {
        $companyName = $request['company_name'];
        $companies = Company::where('company_name', 'like', '%' . $companyName . '%')->orderBy('company_name', 'ASC')->get();
        $showFilter = true;

        return view('companies.index', compact('companies', 'showFilter', 'companyName'));
    }
}
