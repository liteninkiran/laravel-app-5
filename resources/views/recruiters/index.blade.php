@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row py-lg-2">

        {{-- Page Title --}}
        <div class="col-md-6">
            <h1>Recruiters</h1>
        </div>

        {{-- Add New Record --}}
        @can('isAdmin')
            <div class="col-md-6">
                <a href="{{ route('recruiter.create') }}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Add New Recruiter</a>
            </div>
        @endcan

    </div>

    {{-- Toggle Filters Button --}}
    <button id="filter" type="button" class="collapsible p-1">Filters</button>

    {{-- Filters --}}
    <div id="filter-content" class="collapse-content border @if(!$showFilter) hidden @endif">

        <form action="{{ route('recruiterFilter.index') }}" enctype="multipart/form-data" method="post">

            @csrf

            <!-- RECRUITER NAME -->
            <div class="form-group row mx-3">

                <label for="recruiter_name" class="col-md-4 col-form-label pl-0">Recruiter Name</label>
                <input id="recruiter_name"
                        name="recruiter_name"
                        type="text"
                        class="form-control @error('recruiter_name') is-invalid @enderror"
                        value="{{ $recruiterName }}"
                        autocomplete="recruiter_name"
                        autofocus>

                @error('recruiter_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <!-- SUBMIT / RESET -->
            <div class="mx-3 mb-4">
                <button class="btn btn-primary">Apply Filters</button>

                @if($showFilter)
                    <a class="btn btn-secondary float-right" href="{{ route('recruiter.index') }}">Reset Filters</a>
                @endif
            </div>

        </form>

    </div>

    {{-- Records! --}}
    <div class="mt-4">

        @if(count($recruiters) > 0)

            {{-- ID = data-table: JavaScript will add OnClick event handlers for cells to
                                link out to the URL using the data-url attribute from the 
                                TR element --}}
            <table class="table border table-hover" id="data-table">

                {{-- HEADER --}}
                <thead>

                    <tr>

                        {{-- HEADER: DATA --}}
                        <th>Recruiter Name</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Email</th>

                        {{-- HEADER: ACTION BUTTONS / LINKS --}}
                        <th>Actions</th>

                    </tr>

                </thead>

                {{-- BODY --}}
                <tbody>

                    @foreach($recruiters as $recruiter)

                        {{-- NEW RECORD --}}
                        <tr data-url="{{ $recruiter->url }}">

                            {{-- DATA --}}
                            <td>{{ $recruiter->recruiter_name }}</td>
                            <td>{{ $recruiter->company->company_name }}</td>
                            <td>{{ $recruiter->phone }}</td>
                            <td>{{ $recruiter->email }}</td>

                            {{-- ACTION BUTTONS / LINKS --}}
                            <td class="action">

                                <a href="{{ route('recruiter.show', $recruiter) }}"><i class="fa fa-eye px-1"></i></a>

                                @can('isAdmin')
                                    <a href="{{ route('recruiter.edit', $recruiter) }}"><i class="fa fa-edit px-1"></i></a>
                                @endcan

                                @can('isAdmin')
                                    <a href="#"  data-toggle="modal" data-target="#deleteModal" data-recruiterid="{{ $recruiter->id }}" data-recruiterdesc="{{ $recruiter->recruiter_name }}"><i class="fas fa-trash-alt px-1"></i></a>
                                @endcan

                            </td>

                        </tr>

                    @endforeach
    
                </tbody>
    
            </table>

        @else

            <p>No data to display</p>

        @endif

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

                        <form method="POST" action="/recruiter/" id="modal-form">

                            @csrf
                            @method('DELETE')

                            <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Delete</a>

                        </form>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    </div>

                </div>

            </div>

        </div>

        @if(count($recruiters) > 0)

            <div class="container">

                <div class="row">

                    {{-- PAGINATOR --}}
                    {{ $recruiters->links() }}

                    {{-- RECORD COUNT --}}
                    @if($recruiters->total() > $recruiters->perPage())
                        <p class="ml-auto">Showing {{ $recruiters->firstItem() }} - {{ $recruiters->lastItem() }} of {{ $recruiters->total() }} records</p>
                    @else
                        @if($recruiters->total() == 1)
                            <p class="ml-auto">Showing {{ $recruiters->total() }} record</p>
                        @else
                            <p class="ml-auto">Showing {{ $recruiters->total() }} records</p>
                        @endif
                    @endif

                </div>

            </div>

        @endif

    </div>


</div>

@endsection

