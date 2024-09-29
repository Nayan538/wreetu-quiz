<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ (Session::get('layout')=='rtl' ? 'rtl' : 'ltr') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')"/>
    <title>  @yield('title') | Opzo Technologies</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/plugin' . Helper::rlt_ext() . '.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style' . Helper::rlt_ext() . '.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app' . Helper::rlt_ext() . '.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{asset("/assets/plugins/tom-select/custom-tomSelect.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/plugins/tom-select/tom-select.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/plugins/tom-select/tom-select.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/plugins/toastr/toastr.min.css")}}">
    {{-- sweetalert --}}
    <link rel="stylesheet" href="{{asset("/assets/plugins/sweetalerts2/sweetalerts2.css")}}">

    <link rel="stylesheet" href="{{asset("/assets/plugins/datatable/datatables.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/plugins/datatable/dt-global_style.css")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/img/favicon1.png') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">

    @yield('page-head')
    <style>
        .has-child .has-subchild ul li a{
            padding-left: 48px !important;
        }
        /* .has-child .has-subchild ul{
            display: none;
        }
        .has-child .has-subchild.open ul{
            display: block;
        }  */
        .sidebar__menu-group ul.sidebar_nav li ul {
            padding-right: 4px;
            padding-left: 4px;
        }
        .sidebar__menu-group ul.sidebar_nav li.has-subchild.open>a .toggle-icon:before {
            content: "\f107";
        }
    </style>
</head>
