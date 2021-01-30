@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Companies</h1>

    <a href="{{ route('company.create') }}">Add New Company</a>
    <br>

    <button type="button" class="collapsible coll-parent">Filters</button>

    <div class="collapse-content border @if(!$showFilter) hidden @endif">

        <form action="{{ route('companyFilter.index') }}" enctype="multipart/form-data" method="post">

            @csrf

            <!-- COMPANY NAME -->
            <div class="form-group row mx-3">

                <label for="company_name" class="col-md-4 col-form-label pl-0">Company Name</label>
                <input id="company_name"
                        name="company_name"
                        type="text"
                        class="form-control @error('company_name') is-invalid @enderror"
                        value="{{ old('company_name') }}"
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

        @foreach($companies as $company)

            {{ $company->company_name }}
            <br>

        @endforeach

    </div>


</div>

@endsection
