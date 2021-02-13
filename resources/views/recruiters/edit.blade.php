@extends('layouts.app')

@section('content')

<?php $backUrl = (url()->previous() == url()->current()) ? route('recruiter.index') : url()->previous(); ?>

<div class="container">

    <form action="{{ route('recruiter.update', $recruiter->id) }}" enctype="multipart/form-data" method="post">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-8 offset-2">

                <div class="row">
                    @if($edit)
                        <h1>Edit Recruiter</h1>
                    @else
                        <h1>View Recruiter</h1>
                    @endif
                </div>

                <!-- RECRUITER NAME -->
                <div class="form-group row">

                    <label for="recruiter_name" class="col-md-4 col-form-label pl-0">Recruiter Name</label>
                    <input id="recruiter_name"
                           name="recruiter_name"
                           type="text"
                           class="form-control @error('recruiter_name') is-invalid @enderror"
                           value="{{ $recruiter->recruiter_name }}"
                           autocomplete="recruiter_name"
                           autofocus
                           @if(!$edit) disabled @endif>

                    @error('recruiter_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- COMPANY -->
                <div class="form-group row">

                    <label for="company_id" class="col-md-4 col-form-label pl-0">Company</label>

                    <select class="form-control @error('company_id') is-invalid @enderror" name="company_id" @if(!$edit) disabled @endif>
                        <option value="" disabled>Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" @if($recruiter->company->company_name == $company->company_name) selected @endif>
                                {{ $company->company_name }} 
                            </option>
                        @endforeach
                    </select>

                    @error('company_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- PHONE -->
                <div class="form-group row">

                    <label for="phone" class="col-md-4 col-form-label pl-0">Phone</label>
                    <input id="phone"
                           name="phone"
                           type="text"
                           class="form-control @error('phone') is-invalid @enderror"
                           value="{{ $recruiter->phone }}"
                           autocomplete="phone"
                           @if(!$edit) disabled @endif>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- EMAIL -->
                <div class="form-group row">

                    <label for="email" class="col-md-4 col-form-label pl-0">Email</label>
                    <input id="email"
                           name="email"
                           type="text"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ $recruiter->email }}"
                           autocomplete="email"
                           @if(!$edit) disabled @endif>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- SUBMIT / CANCEL -->
                <div class="row pt-4">

                    @if($edit)
                        <button class="btn btn-primary">Submit</button>
                    @endif

                    <a href="<?= $backUrl ?>" class="btn btn-secondary ml-auto">Cancel</a>

                </div>

            </div>

        </div>

    </form>

    
</div>

@endsection
