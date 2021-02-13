<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\Company;

class RecruitersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = config('pagination.recordsPerPage');
        $recruiters = Recruiter::orderBy('recruiter_name')->paginate($page);
        $showFilter = false;
        $recruiterName = null;

        return view('recruiters.index', compact('recruiters', 'showFilter', 'recruiterName'));
    }

    public function create()
    {
        $companies = Company::orderBy('company_name')->get();
        return view('recruiters.create', compact('companies'));
    }

    public function store(Request $request)
    {
        // Store request data
        $data = $request->validate(
        [
            'recruiter_name'   => 'required',
            'phone'            => '',
            'email'            => 'email|nullable',
            'company_id'       => 'required'
        ]);

        // Store data
        auth()->user()->recruiters()->create($data);

        // Redirect to index
        return redirect(route('recruiter.index'));
    }

    public function show(Recruiter $recruiter)
    {
        $edit = false;
        $companies = Company::orderBy('company_name')->get();
        return view('recruiters.edit')->with(compact('recruiter'))->with(compact('edit'))->with(compact('companies'));
    }

    public function edit(Recruiter $recruiter)
    {
        $edit = true;
        $companies = Company::orderBy('company_name')->get();
        return view('recruiters.edit')->with(compact('recruiter'))->with(compact('edit'))->with(compact('companies'));
    }

    public function update(Request $request, Recruiter $recruiter)
    {
        // Store request data
        $data = $request->validate(
        [
            'recruiter_name'   => 'required',
            'phone'            => '',
            'email'            => 'email|nullable',
            'company_id'       => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        // Store data
        $recruiter->update($data);

        // Redirect to index
        return redirect(route('recruiter.index'));
    }

    public function destroy(Recruiter $recruiter)
    {
        $recruiter->delete();

        return back();
    }    
}
