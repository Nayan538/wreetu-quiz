{{-- Company: Wreetu Helth. --}}
{{-- Author: Md Shadhin --}}
{{-- Developer: Md Shadhin --}}
{{-- Copywrite: 2024 --}}

@extends('layout.app')

@section('title', 'Role Create')

@section('page-header')
    <div class="page-title">Role Create</div>

    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Role Create</a></li>
        </ol>
    </nav>
@endsection
@section('content')

    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 page-title-wrapper">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search align-self-center">
                <div class="inner-page-title pt-1">Role Create</div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-sm-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Whoops!</strong> {{ $errors->first() }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('access_control.roles.store') }}" method="POST">
                                @csrf
        
                                <div class="widget mb-4">
                                    <div class="row mb-3">
                                        <label class="col-lg-2 col-form-label " for="name">Role Name:</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter a Role Name">
                                        </div>
                                    </div>
                                </div>
        
                                <h3>Permission access</h3>
                                <div class="widget mb-4">
                                    {{-- @dd($permissionMasters); --}}
        
                                    @foreach ($permissionMasters as $master)
                                        <div>
                                            <h4>{{ $master->title }}</h4>
                                            @if ($master->description)
                                                <div>
                                                    <p> <i class="fa fa-info-circle p-1"
                                                            aria-hidden="true"></i>{{ $master->description }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="accordion mb-2" id="accordion-{{ $master->id }}">
                                            @if($master->permissions->count())
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-{{ $master->id }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse-{{ $master->id }}"
                                                        aria-expanded="false" aria-controls="collapse-{{ $master->id }}">
                                                        {{ $master->title }}
                                                        {{-- <span style="margin-left: auto;"><p style="padding:0px; margin:0px;"> <i class="fa fa-info-circle p-1"
                                                            aria-hidden="true"></i>{{ $master->description }}</p></span> --}}
                                                    </button>
                                                </h2>
                                                <div id="collapse-{{ $master->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $master->id }}"
                                                    data-bs-parent="#accordion-{{ $master->id }}">
                                                    <div class="accordion-body">
                                                        <div class="form-check form-check-inline" title="all">
                                                            <input class="form-check-input all" id="all-{{ $master->id }}"
                                                                type="checkbox">
                                                            <label class="form-check-label"
                                                                for="all-{{ $master->id }}">all</label>
                                                        </div>
                                                        @foreach ($master->permissions ?? [] as $key => $value)
                                                            <div class="form-check form-check-inline"
                                                                title="{{ $value->description }}">
                                                                <input class="form-check-input"
                                                                    name="permitted[{{ $value->id }}][]" type="checkbox"
                                                                    id="{{ $value->id }}" value="{{ $value->id }}">
                                                                <label class="form-check-label"
                                                                    for="{{ $value->id }}">{{ $value->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
        
                                            @foreach ($master->subMasters as $key => $subMaster)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading-{{ $subMaster->id }}">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse-{{ $subMaster->id }}" aria-expanded="false"
                                                            aria-controls="collapse-{{ $subMaster->id }}">
                                                            {{ $subMaster->title }}
                                                            <span style="margin-left: auto;">
                                                                <p style="padding:0px; margin:0px;"> <i
                                                                        class="fa fa-info-circle p-1"
                                                                        aria-hidden="true"></i>{{ $subMaster->description }}</p>
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse-{{ $subMaster->id }}" class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $subMaster->id }}"
                                                        data-bs-parent="#accordion-{{ $subMaster->id }}">
                                                        <div class="accordion-body">
                                                            <div class="form-check form-check-inline" title="all">
                                                                <input class="form-check-input all" id="all-{{ $subMaster->id }}"
                                                                    type="checkbox">
                                                                <label class="form-check-label"
                                                                    for="all-{{ $subMaster->id }}">all</label>
                                                            </div>
                                                            @foreach ($subMaster->permissions ?? [] as $key => $permission)
                                                                <div class="form-check form-check-inline"
                                                                    title="{{ $permission->description }}">
                                                                    <input class="form-check-input"
                                                                        name="permitted[{{ $permission->id }}][]" type="checkbox"
                                                                        id="{{ $permission->id }}"
                                                                        value="{{ $permission->id }}">
                                                                    <label class="form-check-label"
                                                                        for="{{ $permission->id }}">{{ $permission->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
        
                                            {{-- <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Accordion Item #3
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordion-{{ $master->id }}">
                                                    <div class="accordion-body">
                                                        <strong>This is the third item's accordion body.</strong> It is hidden by
                                                        default, until the collapse plugin adds the appropriate classes that we use
                                                        to style each element. These classes control the overall appearance, as well
                                                        as the showing and hiding via CSS transitions. You can modify any of this
                                                        with custom CSS or overriding our default variables. It's also worth noting
                                                        that just about any HTML can go within the <code>.accordion-body</code>,
                                                        though the transition does limit overflow.
                                                    </div>
                                                </div>
                                            </div> --}}
        
                                        </div>
                                    @endforeach
                                </div>
        
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endSection
@section("page_scripts")
    <script>
        $(document).ready(function() {
            $('.all').click(function() {
                console.log("all");
                if ($(this).is(':checked')) {
                    $(this).parents('.accordion-item').find('.form-check-input').prop('checked', true);
                }else{
                    $(this).parents('.accordion-item').find('.form-check-input').prop('checked', false);
                }
            });

            //if all is checked then check all
            $('.form-check-input').not('.all').click(function() {
                if ($(this).parents('.accordion-item').find(".form-check-input:checked").not(".all").length == $(this).parents('.accordion-item').find(".form-check-input").not(".all").length) {
                    $(this).parents('.accordion-item').find('.all').prop('checked', true);
                }else{
                    $(this).parents('.accordion-item').find('.all').prop('checked', false);
                }
            });
        });
    </script>
@endsection
