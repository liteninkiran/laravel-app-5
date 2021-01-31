@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data" method="post">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-8 offset-2">

                <div class="row">

                    <h1>Edit Company</h1>

                </div>

                <!-- COMPANY NAME -->
                <div class="form-group row">

                    <label for="company_name" class="col-md-4 col-form-label pl-0">Company Name</label>
                    <input id="company_name"
                           name="company_name"
                           type="text"
                           class="form-control @error('company_name') is-invalid @enderror"
                           value="{{ $company->company_name }}"
                           autocomplete="company_name"
                           autofocus>

                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- ADDRESS LINE 1 -->
                <div class="form-group row">

                    <label for="address_line_1" class="col-md-4 col-form-label pl-0">Address Line 1</label>
                    <input id="address_line_1"
                           name="address_line_1"
                           type="text"
                           class="form-control @error('address_line_1') is-invalid @enderror"
                           value="{{ $company->address_line_1 }}"
                           autocomplete="address_line_1"
                           autofocus>

                    @error('address_line_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- ADDRESS LINE 2 -->
                <div class="form-group row">

                    <label for="address_line_2" class="col-md-4 col-form-label pl-0">Address Line 2</label>
                    <input id="address_line_2"
                           name="address_line_2"
                           type="text"
                           class="form-control @error('address_line_2') is-invalid @enderror"
                           value="{{ $company->address_line_2 }}"
                           autocomplete="address_line_2"
                           autofocus>

                    @error('address_line_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- ADDRESS LINE 3 -->
                <div class="form-group row">

                    <label for="address_line_3" class="col-md-4 col-form-label pl-0">Address Line 3</label>
                    <input id="address_line_3"
                           name="address_line_3"
                           type="text"
                           class="form-control @error('address_line_3') is-invalid @enderror"
                           value="{{ $company->address_line_3 }}"
                           autocomplete="address_line_3"
                           autofocus>

                    @error('address_line_3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- ADDRESS LINE 4 -->
                <div class="form-group row">

                    <label for="address_line_4" class="col-md-4 col-form-label pl-0">Address Line 4</label>
                    <input id="address_line_4"
                           name="address_line_4"
                           type="text"
                           class="form-control @error('address_line_4') is-invalid @enderror"
                           value="{{ $company->address_line_4 }}"
                           autocomplete="address_line_4"
                           autofocus>

                    @error('address_line_4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- ADDRESS LINE 5 -->
                <div class="form-group row">

                    <label for="address_line_5" class="col-md-4 col-form-label pl-0">Address Line 5</label>
                    <input id="address_line_5"
                           name="address_line_5"
                           type="text"
                           class="form-control @error('address_line_5') is-invalid @enderror"
                           value="{{ $company->address_line_5 }}"
                           autocomplete="address_line_5"
                           autofocus>

                    @error('address_line_5')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- POSTCODE -->
                <div class="form-group row">

                    <label for="post_code" class="col-md-4 col-form-label pl-0">Postcode</label>
                    <input id="post_code"
                           name="post_code"
                           type="text"
                           class="form-control @error('post_code') is-invalid @enderror"
                           value="{{ $company->post_code }}"
                           autocomplete="post_code"
                           autofocus>

                    @error('post_code')
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
                           value="{{ $company->phone }}"
                           autocomplete="phone"
                           autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- URL -->
                <div class="form-group row">

                    <label for="url" class="col-md-4 col-form-label pl-0">URL</label>
                    <input id="url"
                           name="url"
                           type="text"
                           class="form-control @error('url') is-invalid @enderror"
                           value="{{ $company->url }}"
                           autocomplete="url"
                           autofocus>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- SUBMIT -->
                <div class="row pt-4">

                    <button class="btn btn-primary">Submit</button>

                </div>

            </div>

        </div>

    </form>

    
</div>

@endsection
