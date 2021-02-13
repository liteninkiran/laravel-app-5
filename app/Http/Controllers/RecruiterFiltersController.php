<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;

class RecruiterFiltersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $page = config('pagination.recordsPerPage');
        $recruiterName = $request['recruiter_name'];
        $recruiters = Recruiter::where('recruiter_name', 'like', '%' . $recruiterName . '%')->orderBy('recruiter_name', 'ASC')->paginate($page);
        $showFilter = true;

        return view('recruiters.index', compact('recruiters', 'showFilter', 'recruiterName'));
    }
}
