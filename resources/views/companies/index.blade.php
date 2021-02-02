@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row py-lg-2">

        <div class="col-md-6">
            <h1>Companies</h1>
        </div>

        {{-- @can('create', App\Models\Company::class) --}}
            <div class="col-md-6">
                <a href="{{ route('company.create') }}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Add New Company</a>
            </div>
        {{-- @endcan --}}

    </div>

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
                    <th>Actions</th>

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
                        <td class="action">

                            <a href="{{ route('company.show', $company) }}"><i class="fa fa-eye px-1"></i></a>

                            {{-- @can('edit', $company) --}}
                                <a href="{{ route('company.edit', $company) }}"><i class="fa fa-edit px-1"></i></a>
                            {{-- @endcan --}}

                            {{-- @can('delete', $company) --}}
                                <a href="#"  data-toggle="modal" data-target="#deleteModal" data-companyid="{{ $company->id }}" data-companydesc="{{ $company->company_name }}"><i class="fas fa-trash-alt px-1"></i></a>
                            {{-- @endcan --}}

                        </td>

                    </tr>

                @endforeach
 
            </tbody>
 
        </table>

        <!-- Delete Confirmation Modal Dialog Box -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                    </div>

                    <div class="modal-body"></div>

                    <div class="modal-footer">

                        <form method="POST" action="/company/" id="modal-form">

                            @csrf
                            @method('DELETE')

                            <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Delete</a>

                        </form>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    </div>

                </div>

            </div>

        </div>


        <div class="container">

            <div class="row">

                {{-- PAGINATOR --}}
                {{ $companies->links() }}

                {{-- RECORD COUNT --}}
                @if($companies->total() > $companies->perPage())
                    <p class="ml-auto">Showing {{ $companies->firstItem() }} - {{ $companies->lastItem() }} of {{ $companies->total() }} records</p>
                @else
                    @if($companies->total() == 1)
                        <p class="ml-auto">Showing {{ $companies->total() }} record</p>
                    @else
                        <p class="ml-auto">Showing {{ $companies->total() }} records</p>
                    @endif
                @endif

            </div>

        </div>

    </div>


</div>


@endsection

