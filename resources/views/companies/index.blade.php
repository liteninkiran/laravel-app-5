@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Companies</h1>

    <a href="{{ route('company.create') }}">Add New Company</a>
    <br>

    <button id="filter" type="button" class="collapsible coll-parent">Filters</button>

    <div id="filter-content" class="collapse-content border @if(!$showFilter) hidden @endif">

        <form action="{{ route('companyFilter.index') }}" enctype="multipart/form-data" method="post">

            @csrf

            <!-- COMPANY NAME -->
            <div class="form-group row mx-3">

                <label for="company_name" class="col-md-4 col-form-label pl-0">Company Name</label>
                <input id="company_name"
                        name="company_name"
                        type="text"
                        class="form-control @error('company_name') is-invalid @enderror"
                        value="{{ $companyName }}"
                        autocomplete="company_name"
                        autofocus>

                @error('company_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <!-- SUBMIT -->
            <div class="ml-3 mb-4">

                <button class="btn btn-primary">Apply Filter</button>

            </div>

        </form>

    </div>

    <div class="mt-4">
{{-- 
        @foreach($companies as $company)

            <a href="{{ route('company.edit', $company) }}">{{ $company->company_name }}</a>
            <br>

        @endforeach --}}


        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Location</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->address_line_5 }}</td>
                        <td>{{ $company->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>


</div>

@endsection
