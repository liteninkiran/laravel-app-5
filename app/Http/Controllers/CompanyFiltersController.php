<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyFiltersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $page = config('pagination.recordsPerPage');
        $companyName = $request['company_name'];
        $companies = Company::where('company_name', 'like', '%' . $companyName . '%')->orderBy('company_name', 'ASC')->paginate($page);
        $showFilter = true;

        return view('companies.index', compact('companies', 'showFilter', 'companyName'));
    }
}
