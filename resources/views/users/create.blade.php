@section('title', 'User Create')
@section('description', 'User Create ')
@extends('layout.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ trans('menu.create-user-menu-title') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="action-btn mt-sm-0 mt-15">
                        <a href="{{ route('users.index') }}" class="btn btn-warning btn-default btn-squared radius-md shadow2 btn-sm"><i class="fa fa-list"></i> List</a>
                    </div>
                </div>
                <div class="d-flex align-items-center user-member__title mb-2">
                    <h4 class="text-capitalize">{{ trans('user create') }}</h4>
                </div>
                <x-error-alart />
            </div>
        </div>
        <div class="card mb-50">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="mt-40 mb-50">

                    <form action="{{ route('users.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label " for="branch">Branch : </label>
                            <div class="col-lg-10">
                                <select id="select-beast" class="form-select tom-select" name="branch_id"
                                    autocomplete="off">
                                    <option value="">Select a Branch...</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label " for="name">Name : </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                    placeholder="Enter Your Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label " for="email">Email:</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                    placeholder="Enter Your Email">
                            </div>
                        </div>

                        {{-- new password --}}
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label " for="password">Password:</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}"
                                    placeholder="Enter Your Password" autocomplete="new-password">
                            </div>
                        </div>
                     
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label " for="user_roles">Assign A role</label>
                            <div class="col-lg-10">
                                <select id="select-beast" class="form-select tom-select" multiple
                                    placeholder="Select a person..." autocomplete="off">
                                    <option value="">Select a person...</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('user_roles') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label " for="status">Status : </label>
                            <div class="col-lg-10">
                                <select class="form-select tom-select" name="status" id="status">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit form</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 
@section('page_script')
    <script>
        
    </script>
@endsection --}}

@endSection
