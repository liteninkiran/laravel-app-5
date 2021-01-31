@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Companies</h1>

    <a href="{{ route('company.create') }}" class="pl-1">Add New Company</a>

    <button id="filter" type="button" class="collapsible p-1">Filters</button>

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

        {{-- ID = data-table: JavaScript will add OnClick event handlers for cells to
                              link out to the URL using the data-url attribute from the 
                              TR element --}}
        <table class="table border table-hover" id="data-table">

            {{-- HEADER --}}
            <thead>

                <tr>

                    {{-- HEADER: DATA --}}
                    <th>Company Name</th>
                    <th>Location</th>
                    <th>Postcode</th>
                    <th>Phone Number</th>

                    {{-- HEADER: ACTION BUTTONS / LINKS --}}
                    <th style="width:10%"></th>
                    <th style="width:10%"></th>
                    <th style="width:10%"></th>

                </tr>

            </thead>

            {{-- BODY --}}
            <tbody>

                @foreach($companies as $company)

                    {{-- NEW RECORD --}}
                    <tr data-url="{{ $company->url }}">

                        {{-- DATA --}}
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->address_line_5 }}</td>
                        <td>{{ $company->post_code }}</td>
                        <td>{{ $company->phone }}</td>

                        {{-- ACTION BUTTONS / LINKS --}}
                        <td class="action"><a class="btn btn-primary" href="{{ route('company.show', $company) }}" role="button" style="width:75px">Show</a></td>
                        <td class="action"><a class="btn btn-secondary" href="{{ route('company.edit', $company) }}" role="button" style="width:75px">Edit</a></td>

                        <td class="cls1 cls2 action">
                            <form action="{{ route('company.destroy', $company) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{ $company->company_name }}?')" style="width:75px">Delete</button>
                                </div>
                            </form>
                        </td>

                    </tr>

                @endforeach
 
            </tbody>
 
        </table>

        <div class="container">

            <div class="row">

                {{-- PAGINATOR --}}
                {{ $companies->links() }}

                {{-- RECORD COUNT --}}
                @if($companies->total() > $companies->perPage())
                    <p class="ml-auto">Showing {{ $companies->firstItem() }} - {{ $companies->lastItem() }} of {{ $companies->total() }} records</p>
                @else
                    <p class="ml-auto">Showing {{ $companies->total() }} records</p>
                @endif

            </div>

        </div>

    </div>


</div>


@endsection
