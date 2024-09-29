@section('title',"Notifications List")
@section('description',"Notifications List")
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
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('Location list') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="breadcrumb-main__wrapper">
                        <div class="action-btn mt-sm-0 mt-15">
                            @if (hasPermission('notifications.general-notifications.create'))
                                <a href="{{ route('notifications.general-notifications.create') }}" class="btn px-20 btn-primary ">
                                    <i class="las la-plus fs-16"></i>Add New
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 20px">
                <h4 class="text-capitalize breadcrumb-title">{{ trans('Location list') }}</h4>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="zero-config"class="table dt-table-hover" data-page='@include('utils.table_paginate', ['data' => $generalNotifications])' style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Notification Title</th>
                                    {{-- <th>Location Type</th>
                                    <th>Contact Person name</th>
                                    <th>Contact Person Mobile</th>
                                    <th>Address</th>
                                    <th>Lattitude</th>
                                    <th>Longitude</th> --}}
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
                                @foreach ($generalNotifications as $location)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $location->title }}</td>
                                       
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    @if(hasPermission('notifications.general-notifications.edit'))
                                                        <a class="btn btn-outline-warning" href="{{ route('notifications.general-notifications.edit', $location->id) }}"><i
                                                            class="far fa-edit"></i>
                                                        </a>
                                                    @endif
            
                                                    @if(hasPermission('notifications.general-notifications.destroy'))
                                                        <button type="button" data-action="{{ route('notifications.general-notifications.destroy', $location->id) }}"
                                                            class="btn btn-outline-danger delete-confirm"><i
                                                                class="far fa-trash-alt"></i></button>
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