@section('title',"Employee List")
@section('description',"Employee List")
@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('menu.employee-list-menu-title') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="breadcrumb-main__wrapper">
                        <div class="action-btn mt-sm-0 mt-15 d-flex align-items-center">
                            @if (hasPermission('hrm.employees.create'))
                            <a href="{{ route('hrm.employees.create') }}" class="btn px-20 btn-primary btn-sm">
                                <i class="las la-plus fs-16"></i>Add New
                            </a>
                            @endif
                            <a href="{{ request()->fullUrlWithQuery(['export' => 'pdf']) }}" target="_blank"
                                class="btn btn-danger btn-sm mr-5" style="margin-left: 5px;">
                                <i class="las la-file-pdf fs-16"></i> PDF
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.employee-list-menu-title') }}</h4>
            </div>
            <div class="col-md-12">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="text-center">
                                                <select name="full_name" id="full_name" class="form-control tom-select"
                                                    data-placeholder="Select Employee Name">
                                                    <option value=""></option>
                                                    @foreach ($employees as $key => $value)
                                                        <option {{ request('full_name') == $value->full_name ? 'selected' : '' }}
                                                            value="{{ $value->full_name }}">
                                                            {{ $value->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <input type="text" class="form-control" name="present_address"
                                                    value="{{ request('present_address') }}" autocomplete="off"
                                                    placeholder="Search by Address">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" class="form-control" name="personal_mobile"
                                                    value="{{ request('personal_mobile') }}" autocomplete="off"
                                                    placeholder="Search by Mobile">
                                            </td>
                                            <td colspan="5" class="text-right">
                                                <div class="btn-group btn-corner">
                                                    <button class="btn btn-xs btn-primary"><i class="fa fa-search"></i>
                                                        Search</button>
                                                    <a href="{{ request()->url() }}" class="btn btn-xs btn-warning"><i
                                                            class="fa fa-refresh"></i> Refresh</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="zero-config"class="table dt-table-hover" data-page='@include('utils.table_paginate', ['data' => $employees])' style="width:100%">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>personal_mobile</th>
                                    <th class="no-content">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>name</td>
                                    <td>email</td>
                                    <td class="no-content">Action</td>
                                </tr> --}}
                                {{-- @dd($employees) --}}
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>
                                            <a class="text-dark fw-500"
                                                href="{{ route('hrm.employees.show', $employee->id) }}">
                                                {{ $employee->full_name }}{{ $employee->id }}</i>
                                            </a>
                                        </td>
                                        {{-- <td>{{ $employee->full_name }}</td> --}}
                                        <td>{{ $employee->present_address }}</td>
                                        <td>{{ $employee->personal_mobile }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                @if (hasPermission('hrm.employees.update'))
                                                    <a class="btn btn-outline-warning" href="{{ route('hrm.employees.edit', $employee->id) }}"><i
                                                            class="far fa-edit"></i></a>
                                                @endif
            
                                                {{-- @if (hasPermission('users.update'))
                                                    <a href="{{ route('hrm.employees.edit_password', $employee->id) }}"
                                                        class="btn btn-outline-info">
                                                        <i class="fas fa-key"></i>
                                                    </a>
                                                @endif --}}
            
                                                @if (hasPermission('hrm.employees.destroy'))
                                                    <button type="button" data-action="{{ route('hrm.employees.destroy', $employee->id) }}"
                                                        class="btn btn-outline-danger delete-confirm"><i
                                                            class="far fa-trash-alt"></i></button>
                                                @endif
            
                                                @if (hasPermission('hrm.employees.show'))
                                                    <a class="btn btn-outline-primary" href="{{ route('hrm.employees.show', $employee->id) }}"><i class="fas fa-eye"></i></a>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-none">
                            <form class="delete-form" action="" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection