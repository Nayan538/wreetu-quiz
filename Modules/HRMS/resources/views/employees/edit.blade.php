@section('title', 'Edit Employee ')
@section('description', 'Edit Employee ')
@extends('layout.app')

@section('page-header')
    <style>
        .card-body {
            margin-right: 7vh;
            margin-left: 7vh;
        }

        .row {
            padding-right: 1vh;
            padding-left: 1vh;
        }

        /* Style for all <a> tags */
        .nav-tabs.vertical-tabs .nav-item .nav-link {
            background-color: #f7ecfd;
            /* Background color */
            color: #3d3d3d;
            /* Text color */
            border-radius: 5px 5px 0 0;
            /* 5px radius for top-left and top-right corners */
        }

        /* Style for active tab */
        .nav-tabs.vertical-tabs .nav-item .nav-link.active {
            background-color: var(--color-primary);
            /* Background color */
            color: #ffffff;
            /* Text color */
        }

        .nav-tabs.vertical-tabs .nav-item .nav-link {
            background-color: #f7ecfd;
            /* Background color */
            color: #3d3d3d;
            /* Text color */
            border-radius: 5px 5px 0 0;
            /* 5px radius for top-left and top-right corners */
        }

        /* Style for active tab */
        .nav-tabs.vertical-tabs .nav-item .nav-link.active {
            background-color: var(--color-primary);
            /* Background color */
            color: #ffffff;
            /* Text color */
        }

        /* .ts-control {
            height: 48px !important;
        } */
        .password-container {
            position: relative;
            width: 100%;
        }

        .password-container input {
            width: 100%;
            padding-right: 40px; /* Adjust to make space for the icon */
            box-sizing: border-box;
        }

        .password-container .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #aaa; /* Optional: adjust the icon color */
        }

        .password-container .toggle-password:hover {
            color: #333; /* Optional: adjust the hover color */
        }
    </style>
@endsection
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ trans('menu.edit-employee-menu-title') }}</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="action-btn mt-sm-0 mt-15">
                            @if (hasPermission('hrm.employees.index'))
                            <a href="{{ route('hrm.employees.index') }}" class="btn btn-warning btn-default btn-squared radius-md shadow2 btn-sm"><i class="fa fa-list"></i> List</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-2">
                    <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.edit-employee-menu-title') }}</h4>
                    <x-error-alart />
                </div>

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title mt-4 mb-4">Personal Information</h2>
                            <form method="POST" action="{{ route('hrm.employees.update', $employee->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")

                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label for="user_branch_id" class="color-dark fs-14 fw-500 align-center">Branch<span class="text-danger">*</span> </label>
                                            <select name="user_branch_id" id="user_branch_id" class="form-control ip-gray radius-xs b-light px-15 tom-select" required>
                                                <option value="">Select</option>
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}" {{ old('user_branch_id', $employee->employementDetail->branch_id) == $branch->id ? 'selected' : '' }}>{{ $branch->name }} ({{ $branch->branchType->name }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label for="employment_type" class="color-dark fs-14 fw-500 align-center">Employment Type <span class="text-danger">*</span>:</label>
                                            <select class="form-control tom-select" id="employment_type" name="employment_type_id" required>
                                                <option value="1" @if(old("employment_type_id", $employee->employementDetail->employment_type_id) == "1") selected @endif>Employee</option>
                                                <option value="2" @if(old("employment_type_id", $employee->employementDetail->employment_type_id) == "2") selected @endif>Dealar</option>
                                                <option value="3" @if(old("employment_type_id", $employee->employementDetail->employment_type_id) == "3") selected @endif>Sub Dealar</option>
                                                <option value="4" @if(old("employment_type_id", $employee->employementDetail->employment_type_id) == "4") selected @endif>SR</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label for="full_name" class="color-dark fs-14 fw-500 align-center">Full
                                                Name<span class="text-danger">*</span> </label>
                                            <input type="text"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="full_name" name="full_name" value="{{ old('full_name', $employee->full_name) }}" required>
                                        </div>
                                    </div>

                                   
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="father_name" class="color-dark fs-14 fw-500 align-center">Father's
                                                Name<span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="father_name" name="father_name" value="{{ old('father_name', $employee->father_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="mother_name" class="color-dark fs-14 fw-500 align-center">Mother's
                                                Name<span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="mother_name" name="mother_name" value="{{ old('mother_name', $employee->mother_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label class="color-dark fs-14 fw-500 align-center">Gender<span
                                                    class="text-danger">*</span></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    @if (old('gender', $employee->gender) == 'male') checked @endif id="gender_male"
                                                    value="male">
                                                <label class="form-check-label" for="gender_male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    @if (old('gender', $employee->gender) == 'female') checked @endif id="gender_female"
                                                    value="female">
                                                <label class="form-check-label" for="gender_female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">


                                        <div class="form-group mb-0 form-group-calender">
                                            <label for="date_of_birth" class="color-dark fs-14 fw-500 align-center">Date of
                                                Birth:</label>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control form-control-default ip-gray radius-xs b-light px-15 flatdate"
                                                    value="{{ old('dob', $employee->date_of_birth) }}" name="date_of_birth" id="date_of_birth"
                                                    placeholder="dd/mm/yyyy">
                                                <a href="#"><img src="{{ asset('assets/img/svg/calendar.svg') }}"
                                                        alt="calendar" class="svg"></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="office_phone" class="color-dark fs-14 fw-500 align-center">Office
                                                Phone<span class="text-danger">*</span></label>
                                            <input type="tel"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="office_phone" name="office_phone" value="{{ old('office_phone', $employee->office_phone) }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="personal_mobile"
                                                class="color-dark fs-14 fw-500 align-center">Personal Mobile<span
                                                    class="text-danger">*</span></label>
                                            <input type="tel"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="personal_mobile" name="personal_mobile"
                                                value="{{ old('personal_mobile', $employee->personal_mobile) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="alternate_phone"
                                                class="color-dark fs-14 fw-500 align-center">Alternate Phone:</label>
                                            <input type="tel"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="alternate_phone" name="alternate_phone"
                                                value="{{ old('alternate_phone', $employee->alternate_phone) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="email_address" class="color-dark fs-14 fw-500 align-center">Email
                                                Address<span class="text-danger">*</span></label>
                                            <input type="email"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="email_address" name="email_address"
                                                value="{{ old('email_address', $employee->email_address) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="country"
                                                class="color-dark fs-14 fw-500 align-center">Country<span
                                                    class="text-danger">*</span></label>
                                            <select
                                                class="form-control ip-gray radius-xs b-light px-15 tom-select"
                                                id="country" name="country" required>
                                                
                                                {{-- @php
                                                    $ff = Faker\Factory::create()->unique();
                                                @endphp
                                                @for ($i = 0; $i < 195; $i++)
                                                    @php
                                                        $country = $ff->country();
                                                    @endphp
                                                    <option value="{{ $country }}"
                                                        @if (old('country') == $country) selected @endif>
                                                        {{ $country }}</option>
                                                @endfor --}}
                                                <option value="">Select Country</option>
                                                @foreach (cuntriesNames() as $country)
                                                    <option value="{{ $country }}" @if (old('country', $employee->country) == $country) selected @endif>
                                                    {{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="city" class="color-dark fs-14 fw-500 align-center">City<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="city" name="city" value="{{ old('city', $employee->city) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="present_address"
                                                class="color-dark fs-14 fw-500 align-center">Present Address<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control ip-gray radius-xs b-light px-15" id="present_address" name="present_address"
                                                rows="3">{{ old('present_address', $employee->present_address) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="permanent_address"
                                                class="color-dark fs-14 fw-500 align-center">Permanent Address<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control ip-gray radius-xs b-light px-15" id="permanent_address"
                                                name="permanent_address" rows="3">{{ old('permanent_address', $employee->permanent_address) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="blood_group" class="color-dark fs-14 fw-500 align-center">Blood
                                                Group<span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control ip-gray radius-xs b-light px-15"
                                                id="blood_group" name="blood_group" value="{{ old('blood_group', $employee->blood_group) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="religion"
                                                class="color-dark fs-14 fw-500 align-center">Religion<span
                                                    class="text-danger">*</span></label>
                                            <select
                                                class="form-control ip-gray radius-xs b-light px-15 tom-select tom-select"
                                                id="religion" name="religion" >
                                                <option value="">Select</option>
                                                <option value="islam" @if(old("religion", $employee->religion) == "islam") selected @endif>Islam</option>
                                                <option value="hindu" @if(old("religion", $employee->religion) == "hindu") selected @endif>Hindu</option>
                                                <option value="christian" @if(old("religion", $employee->religion) == "christian") selected @endif>Christian</option>
                                                <option value="buddhist" @if(old("religion", $employee->religion) == "buddhist") selected @endif>Buddhist</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="marital_status"
                                                class="color-dark fs-14 fw-500 align-center">Marital Status<span
                                                    class="text-danger">*</span></label>
                                            <select
                                                class="form-control ip-gray radius-xs b-light px-15 tom-select"
                                                id="marital_status" name="marital_status" >
                                                <option value="">Select</option>
                                                <option value="single" @if(old("marital_status", $employee->marital_status) == "single") selected @endif>Single</option>
                                                <option value="married" @if(old("marital_status", $employee->marital_status) == "married") selected @endif>Married</option>
                                                <option value="divorced" @if(old("marital_status", $employee->marital_status) == "divorced") selected @endif>Divorced</option>
                                                <!-- Add other marital statuses -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-group">
                                            <label for="photograph"
                                                class="color-dark fs-14 fw-500 align-center">Photograph<span
                                                    class="text-danger">*</span></label>
                                            <input type="file" accept="image/*" id="photograph" name="photograph"
                                                value="{{ old('photograph', $employee->photograph) }}" class="file-control">
                                        </div>
                                    </div>


                                    {{-- start  --}}

                                    <div class="dm-tab tab-horizontal">
                                        <ul class="nav nav-tabs vertical-tabs" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active" id="tab-v-2-tab" data-bs-toggle="tab"
                                                    href="#tab-v-2" role="tab" aria-selected="true">Employment
                                                    Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " id="tab-v-3-tab" data-bs-toggle="tab"
                                                    href="#tab-v-3" role="tab" aria-selected="true">Personal
                                                    Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab-v-1-tab" data-bs-toggle="tab"
                                                    href="#tab-v-1" role="tab" aria-selected="false">Educational
                                                    Information</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="tab-v-4-tab" data-bs-toggle="tab"
                                                    href="#tab-v-4" role="tab" aria-selected="false">Bank Account
                                                    Details</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content">


                                            <div class="tab-pane fade " id="tab-v-3" role="tabpanel"
                                                aria-labelledby="tab-v-3-tab">
                                                <div class="row">
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="resume"
                                                                class="color-dark fs-14 fw-500 align-center">Resume/CV
                                                               :</label>
                                                            <input type="file" class="form-control-file file-control"
                                                                id="resume" name="resume"
                                                                value="{{ old('resume') }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="front_image"
                                                                class="color-dark fs-14 fw-500 align-center">Front
                                                                Image :</label>
                                                            <input type="file" class="form-control-file file-control"
                                                                id="front_image" name="front_image"
                                                                value="{{ old('front_image') }}" class="file-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="back_image"
                                                                class="color-dark fs-14 fw-500 align-center">Back
                                                                Image :</label>
                                                            <input type="file" class="form-control-file file-control"
                                                                id="back_image" name="back_image"
                                                                value="{{ old('back_image') }}" class="file-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="signature"
                                                                class="color-dark fs-14 fw-500 align-center">Signature
                                                                :</label>
                                                            <input type="file" class="form-control-file file-control"
                                                                id="signature" name="signature"
                                                                value="{{ old('signature') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="address_proof"
                                                                class="color-dark fs-14 fw-500 align-center">Address
                                                                Proof:</label>
                                                            <input type="file" class="form-control-file file-control"
                                                                id="address_proof" name="address_proof"
                                                                value="{{ old('address_proof') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="other_documents"
                                                                class="color-dark fs-14 fw-500 align-center">Other
                                                                Documents:</label>
                                                            <input type="file" class="form-control-file file-control"
                                                                id="other_documents" name="other_documents"
                                                                value="{{ old('other_documents') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade show active" id="tab-v-2" role="tabpanel"
                                                aria-labelledby="tab-v-2-tab">
                                                    <div class="row mb-4 employement-details"
                                                        style="border-bottom: 1px solid #dee2e6">
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="card_no"
                                                                    class="color-dark fs-14 fw-500 align-center">Employee
                                                                    ID/Number <span class="text-danger">*</span>:</label>
                                                                <input type="text"
                                                                    class="form-control ip-gray radius-xs b-light px-15"
                                                                    id="card_no" name="card_no" value="{{ old('card_no', $employee->employementDetail->card_no) }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="date_of_joining"
                                                                    class="color-dark fs-14 fw-500 align-center">Date of
                                                                    Joining <span class="text-danger">*</span>:</label>
                                                                <input type="text"
                                                                    class="form-control flatdate ip-gray radius-xs b-light px-15"
                                                                    id="date_of_joining" name="date_of_joining" value="{{ old('date_of_joining', $employee->employementDetail->date_of_joining) }}" required>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="department"
                                                                    class="color-dark fs-14 fw-500 align-center">Department:<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="department_id" id="department" class="form-control tom-select" required>
                                                                    <option value="">Select Department</option>
                                                                    @foreach ($departments as $department)
                                                                        <option value="{{ $department->id }}" {{ old('department_id', $employee->employementDetail->department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="designation"
                                                                    class="color-dark fs-14 fw-500 align-center">Designation/Job
                                                                    Title <span class="text-danger">*</span>:</label>
                                                               <select name="designation_id" id="designation_id" class="form-control tom-select">
                                                                    <option value="">Select Designation</option>
                                                                    @foreach ($designations as $designation)
                                                                        <option value="{{ $designation->id }}" {{ old('designation_id', $employee->employementDetail->designation_id) == $designation->id ? 'selected' : '' }}>{{ $designation->name }}</option>
                                                                    @endforeach
                                                               </select>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="supervisor"
                                                                    class="color-dark fs-14 fw-500 align-center">Supervisor/Manager
                                                                    :</label>
                                                                <select name="supervisor" id="supervisor" class="form-control tom-select">
                                                                    <option value="">Select Supervisor</option>
                                                                    @foreach ($employees as $value)
                                                                        <option value="{{ $value->id }}" {{ old('supervisor', $employee->id) == $value->id ? 'selected' : '' }}>{{ $value->full_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="national_id"
                                                                class="color-dark fs-14 fw-500 align-center">National Id
                                                                no. <span class="text-danger">*</span>:</label>
                                                            <input type="text"
                                                                class="form-control ip-gray radius-xs b-light px-15 file-control"
                                                                id="national_id" name="national_id"
                                                                value="{{ old('national_id', $employee->national_id) }}">
                                                        </div>
                                                    </div>
                                                {{-- <div class="row mb-4 d-flex justify-content-end">
                                                    <button class="btn btn-primary btn-xs add-employement-details"
                                                        type="button">
                                                        <i class="fa fa-plus">Add More</i>
                                                    </button>
                                                </div> --}}
                                            </div>

                                            <div class="tab-pane fade" id="tab-v-1" role="tabpanel" aria-labelledby="tab-v-1-tab">
                                                <div class="row education-details" style="border-bottom: 1px solid #dee2e6">
                                                    @foreach ($employee->educationDetails as $key => $educationDetail)
                                                    <div class="col-md-12 education-row">
                                                        <div class="row mb-4">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="degree_title" class="color-dark fs-14 fw-500 align-center">Degree Title:</label>
                                                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="degree_title" name="degree_title[]" value="{{ $educationDetail->degree_title }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="institute_name" class="color-dark fs-14 fw-500 align-center">Institute Name:</label>
                                                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="institute_name" name="institute_name[]" value="{{ $educationDetail->institute_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="group" class="color-dark fs-14 fw-500 align-center">Group:</label>
                                                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="group" name="group[]" value="{{ $educationDetail->group }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="duration" class="color-dark fs-14 fw-500 align-center">Duration:</label>
                                                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="duration" name="duration[]" value="{{ $educationDetail->duration }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="passing_year" class="color-dark fs-14 fw-500 align-center">Passing Year:</label>
                                                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="passing_year" name="passing_year[]" value="{{ $educationDetail->passing_year }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="result" class="color-dark fs-14 fw-500 align-center">Result:</label>
                                                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="result" name="result[]" value="{{ $educationDetail->result }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="certificate_upload" class="color-dark fs-14 fw-500 align-center">Upload Certificate:</label>
                                                                    <input type="file" class="form-control file-control" id="certificate_upload" name="certificate_upload[]" value="{{ $educationDetail->certificate_upload }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 d-flex align-items-center">
                                                                <button type="button" class="btn btn-danger btn-xs remove-education-details" style="padding: 10px 15px; font-size: 14px; font-weight: bold;">
                                                                    <i class="fa fa-trash"></i> Remove
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="row mb-4 d-flex justify-content-center">
                                                    <button class="btn btn-primary btn-xs add-education-details" type="button" style="padding: 10px 20px; border-radius: 5px; font-size: 14px; font-weight: bold; display: flex; align-items: center;">
                                                        <i class="fa fa-plus" style="margin-right: 8px;"></i> Add More
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="tab-v-4" role="tabpanel"
                                                aria-labelledby="tab-v-4-tab">
                                                <div class="row">
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="bank_name"
                                                                class="color-dark fs-14 fw-500 align-center">Bank
                                                                Name :</label>
                                                            <input type="text"
                                                                class="form-control ip-gray radius-xs b-light px-15"
                                                                id="bank_name" name="bank_name"
                                                                value="{{ old('bank_name', $employee->bank_name) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="account_holder_name"
                                                                class="color-dark fs-14 fw-500 align-center">Account Holder
                                                                Name :</label>
                                                            <input type="text"
                                                                class="form-control ip-gray radius-xs b-light px-15"
                                                                id="account_holder_name" name="account_holder_name"
                                                                value="{{ old('account_holder_name', $employee->account_holder_name) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="account_number"
                                                                class="color-dark fs-14 fw-500 align-center">Account
                                                                Number :</label>
                                                            <input type="text"
                                                                class="form-control ip-gray radius-xs b-light px-15"
                                                                id="account_number" name="account_number"
                                                                value="{{ old('account_number', $employee->account_number) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="branch"
                                                                class="color-dark fs-14 fw-500 align-center">Branch:</label>
                                                            <input type="text"
                                                                class="form-control ip-gray radius-xs b-light px-15"
                                                                id="branch" name="branch"
                                                                value="{{ old('branch', $employee->branch) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">
                                                            <label for="routing_number"
                                                                class="color-dark fs-14 fw-500 align-center">Routing
                                                                Number :</label>
                                                            <input type="text"
                                                                class="form-control ip-gray radius-xs b-light px-15"
                                                                id="routing_number" name="routing_number"
                                                                value="{{ old('routing_number', $employee->routing_number) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="dm-tab tab-horizontal">
                                            <ul class="nav nav-tabs vertical-tabs" role="tablist">
                                                
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="tab-v-5-tab" data-bs-toggle="tab"
                                                        href="#tab-v-5" role="tab" aria-selected="true">Tax and
                                                        Legal
                                                        Information</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-v-6-tab" data-bs-toggle="tab"
                                                        href="#tab-v-6" role="tab" aria-selected="false">Benefits and
                                                        Compensation</a>
                                                </li>
                                               

                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-v-8-tab" data-bs-toggle="tab"
                                                        href="#tab-v-8" role="tab" aria-selected="false">Additional
                                                        Information</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">



                                                <div class="tab-pane fade show active" id="tab-v-5" role="tabpanel"
                                                    aria-labelledby="tab-v-5-tab">
                                                    {{-- <h2>Tax and Legal Information</h2> --}}
                                                        <div class="row">
                                                            <div class="col-md-4 mb-4">
                                                                <div class="form-group">
                                                                    <label for="etin_number"
                                                                        class="color-dark fs-14 fw-500 align-center">eTIN
                                                                        Number :</label>
                                                                    <input type="text"
                                                                        class="form-control ip-gray radius-xs b-light px-15"
                                                                        id="etin_number" name="etin_number"
                                                                        value="{{ old('etin_number', $employee->etin_number) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="form-group">
                                                                    <label for="epf_number"
                                                                        class="color-dark fs-14 fw-500 align-center">Employee
                                                                        Provident Fund (EPF) Number:</label>
                                                                    <input type="text"
                                                                        class="form-control ip-gray radius-xs b-light px-15"
                                                                        id="epf_number" name="epf_number"
                                                                        value="{{ old('epf_number', $employee->epf_number) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab-v-6" role="tabpanel"
                                                    aria-labelledby="tab-v-6-tab">
                                                    <div class="row">
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="basic_salary"
                                                                    class="color-dark fs-14 fw-500 align-center">Basic
                                                                    Salary:</label>
                                                                <input type="number"
                                                                    class="form-control ip-gray radius-xs b-light px-15"
                                                                    id="basic_salary" name="basic_salary"
                                                                    value="{{ old('basic_salary', $employee->basic_salary) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="gross_salary"
                                                                    class="color-dark fs-14 fw-500 align-center">Gross
                                                                    Salary:</label>
                                                                <textarea class="form-control ip-gray radius-xs b-light px-15" id="gross_salary" name="gross_salary"
                                                                    value="{{ old('gross_salary', $employee->gross_salary) }}" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="insurance_coverage" name="insurance_coverage"
                                                                        @if (old('insurance_coverage', $employee->insurance_coverage) == '1') checked @endif
                                                                        value="1">
                                                                    <label class="form-check-label"
                                                                        for="insurance_coverage">Insurance Coverage</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="leave_entitlement"
                                                                    class="color-dark fs-14 fw-500 align-center">Leave
                                                                    Entitlement:</label>
                                                                <input type="text"
                                                                    class="form-control ip-gray radius-xs b-light px-15"
                                                                    id="leave_entitlement" name="leave_entitlement"
                                                                    value="{{ old('leave_entitlement', $employee->leave_entitlement) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <div class="form-group">
                                                                <label for="other_benefits"
                                                                    class="color-dark fs-14 fw-500 align-center">Other
                                                                    Benefits:</label>
                                                                <textarea class="form-control ip-gray radius-xs b-light px-15" id="other_benefits" name="other_benefits"
                                                                    rows="3">{{ old('other_benefits', $employee->other_benefits) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab-v-8" role="tabpanel"
                                                    aria-labelledby="tab-v-8-tab">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-group">
                                                                <label for="additional_notes"
                                                                    class="color-dark fs-14 fw-500 align-center">Additional
                                                                    Notes:</label>
                                                                <textarea class="form-control ip-gray radius-xs b-light px-15" id="additional_notes"
                                                                    name="additional_notes" rows="3">{{ old('additional_notes, $employee->additional_notes') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="button-group d-flex pt-25 justify-content-md-end justify-content-start"
                                            style="padding: 40px;">
                                            <button type="submit"
                                                class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">Submit</button>
                                        </div>

                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')

    <script>
        $('.datePicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        var employmentDetailsRow = $(".employement-details").clone();

        employmentDetailsRow.find("input").each(function() {
            $(this).val("");
        });

        employmentDetailsRow.find("select:selected").each(function() {
            $(this).prop('selected', false);
        });

        employmentDetailsRow.find("input:checked").each(function() {
            $(this).prop('checked', false);
        });

        $(document).on('click', '.add-employement-details', function() {
            const newRow = employmentDetailsRow.clone();
            newRow.find(".tom-select").each(function() {
                new TomSelect(this, {});
            })
            $(".employement-details").after(newRow);
        })

        $(document).ready(function() {
        // Clone the education row, reset inputs and handle adding new row
            $(document).on('click', '.add-education-details', function() {
                var educationDetailsRow = $(".education-row:first").clone();
                educationDetailsRow.find("input").val("");
                educationDetailsRow.insertAfter(".education-row:last");
            });

            // Remove education details row
            $(document).on('click', '.remove-education-details', function() {
                if ($(".education-row").length > 1) {
                    $(this).closest('.education-row').remove();
                } else {
                    alert('You need to keep at least one education detail.');
                }
            });
        });

        
    </script>

@endSection
