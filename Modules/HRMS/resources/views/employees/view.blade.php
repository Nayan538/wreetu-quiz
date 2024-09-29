<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $employee->full_name }}</title>
</head>
<style>
    @page {
        header: page-header;
        footer: page-footer;
        sheet-size: A4;
        margin: 50px;
    }

    table,
    td,
    th {
        font-size: 11px;
        font-family: Arial, sans-serif;
    }

    table {
        border-top: none;
        border-left: none;
        border-right: none;
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        padding-left: 2px !important;
    }

    th.head {
        background-color: rgba(143, 175, 170, 0.35);
        height: 40px;
        font-size: 12px;
    }

    td.loop_td {
        height: 58px;
        font-size: 12px;
    }

    .text-center {
        text-align: center;
        color: rgb(101, 101, 101)
    }

    .heading-style th {
        background-color: rgb(240, 236, 236);
        padding: 7px 0;
        border: 1px solid rgb(240, 236, 236);
        color: rgb(101, 101, 101)
    }

    .heading-style2 th {
        color: rgb(101, 101, 101)
    }

    .body-style td {
        padding: 5px 4px;
        border: 1px solid rgb(240, 236, 236);
        color: rgb(101, 101, 101)
    }

    .basic-style th,
    .basic-style td {
        color: rgb(67, 67, 67)
    }
</style>

<body>
    <table class="table" style="font-size: 10px !important">
        <tr class="heading-style2">
            <th style="border: none; text-align: left;">
                <h3>{{ $employee->full_name }}</h3>
                @foreach ($employee->employementDetails as $key => $employementDetail)
                    <h3>{{ $employementDetail->designation }}</h3>
                    <h3>{{ optional($employementDetail->branch)->name }}</h3>
                @endforeach
                <h3>{{ $employee->email_address }}</h3>
            </th>
            <td style="border: none; text-align: right;">
                @if ($employee->photograph)
                    <img src="{{ s3FileToBase64($employee->photograph) }}"
                        style="width: 90px; display: block; border: 2px solid gray; padding: 5px;"
                        alt="{{ $employee->photograph }}">
                @else
                    <img src="{{ asset('/assets/img/default-user.jpg') }}"
                        style="width: 90px; display: block;">
                @endif
            </td>

        </tr>

        <td colspan="2">
            <hr style="height: 2px; color: #a0a0a0; background: #a0a0a0; " />
        </td>

        <tr>
            <td>
                <table class="table basic-style" style="font-size: 10px !important">
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">Name
                        </td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->full_name }}</td>
                    </tr>

                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">
                            Father's Name</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->father_name }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">
                            Mother's Name</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->mother_name }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">gender
                        </td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->office_phone }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">Office
                            Phone</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->office_phone }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">
                            Personal Mobile</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->personal_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">
                            Alternate Phone</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->alternate_phone }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">Email
                            Address</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->email_address }}
                        </td>
                    </tr>

                </table>
            </td>

            <td>
                <table class="table basic-style" style="font-size: 10px !important">

                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">
                            Country</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->country }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="46%">City
                        </td>
                        <td style="text-align: left" width="4%">:</td>
                        <td style="text-align: left; text-align: left" width="46%">{{ $employee->city }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="46%">
                            Present Address</td>
                        <td style="text-align: left" width="4%">:</td>
                        <td style="text-align: left; text-align: left" width="46%">
                            {{ $employee->present_address }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="46%">
                            Permanent Address</td>
                        <td style="text-align: left" width="4%">:</td>
                        <td style="text-align: left; text-align: left" width="46%">
                            {{ $employee->permanent_address }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="46%">
                            Blood Group</td>
                        <td style="text-align: left" width="4%">:</td>
                        <td style="text-align: left; text-align: left" width="46%">
                            {{ $employee->blood_group }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="46%">
                            Religion</td>
                        <td style="text-align: left" width="4%">:</td>
                        <td style="text-align: left; text-align: left" width="46%">
                            {{ $employee->religion }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left; border: none; font-weight: bold;" width="47%">
                            Marital Status</td>
                        <td style="text-align: left" width="2%">:</td>
                        <td style="text-align: left; text-align: left" width="47%">
                            {{ $employee->marital_status }}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <h4 class="text-center" style="margin-bottom: 8;">Employment Details</h4>
    <table class="table" border="1">
        <thead class="heading-style">
            <tr>
                <th>Sl</th>
                <th>Employee ID/Number</th>
                <th>Date of Joining</th>
                <th>Employment Type</th>
                <th>Department</th>
                <th>Branch</th>
                <th>Supervisor/Manager</th>
            </tr>
        </thead>

        <tbody class="body-style">
            @foreach ($employee->employementDetails as $key => $employementDetail)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $employementDetail->employee_id }}</td>
                    <td>{{ $employementDetail->date_of_joining }}</td>
                    <td>{{ $employementDetail->employment_type_id }}</td>
                    <td>{{ $employementDetail->department_id }}</td>
                    <td>{{ optional($employementDetail->branch)->name }}</td>
                    <td>{{ $employementDetail->supervisor }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="text-center" style="margin-bottom: 8px;">Educational Information</h4>
    <table class="table" border="1">
        <thead class="heading-style">
            <tr>
                <th>Sl</th>
                <th>Degree Title</th>
                <th>Institute Name</th>
                <th>Group</th>
                <th>Duration</th>
                <th>Passing Year</th>
                <th>Result</th>
            </tr>
        </thead>
    
        <tbody class="body-style">
            @foreach ($employee->educationDetails as $key => $educationDetail)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $educationDetail->degree_title }}</td>
                    <td>{{ $educationDetail->institute_name }}</td>
                    <td>{{ $educationDetail->group }}</td>
                    <td>{{ $educationDetail->duration }}</td>
                    <td>{{ $educationDetail->passing_year }}</td>
                    <td>{{ $educationDetail->result }}</td>
                </tr>
                <tr class="heading-style">
                    <th colspan="7" style="text-align: center;">Certificate</th>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">
                        <img src="{{ s3FileToBase64($educationDetail->certificate_upload) }}" alt="" style="width: 150px;">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    


    <h4 class="text-center" style="margin-bottom: 8;">Bank Account Details</h4>
    <table class="table" border="1">
        <thead class="heading-style">
            <tr>
                <th>Bank Name</th>
                <th>Account Holder Name</th>
                <th>Account Number</th>
                <th>Branch</th>
                <th>Routing Number</th>
            </tr>
        </thead>

        <tbody class="body-style">
            <tr>
                <td>{{ $employee->bank_name }}</td>
                <td>{{ $employee->account_holder_name }}</td>
                <td>{{ $employee->account_number }}</td>
                <td>{{ old('branch', $employee->branch) }}</td>
                <td>{{ $employee->routing_number }}</td>
            </tr>
        </tbody>
    </table>


    <h4 class="text-center" style="margin-bottom: 8;">Tax and Legal Information</h4>
    <table class="table" border="1">
        <thead class="heading-style">
            <tr>
                <th>ETIN Number</th>
                <th>EPF Number</th>
            </tr>
        </thead>

        <tbody class="body-style">
            <tr>
                <td>{{ $employee->etin_number }}</td>
                <td>{{ $employee->epf_number }}</td>
            </tr>
        </tbody>
    </table>


    <h4 class="text-center" style="margin-bottom: 8;">Benefits and Compensation</h4>
    <table class="table" border="1">
        <thead class="heading-style">
            <tr>
                <th>Basic Salary</th>
                <th>Gross Salary</th>
                <th>Insurance Coverage</th>
                <th>Leave Entitlement</th>
                <th>Other Benefits</th>
            </tr>
        </thead>

        <tbody class="body-style">
            <tr>
                <td>{{ $employee->basic_salary }}</td>
                <td>{{ $employee->gross_salary }}</td>
                <td>{{ $employee->insurance_coverage }}</td>
                <td>{{ $employee->leave_entitlement }}</td>
                <td>{{ $employee->other_benefits }}</td>
            </tr>
        </tbody>
    </table>

    <h4 class="text-center" style="margin-bottom: 8;">Personal Details</h4>
    <table class="table" border="1">
        <thead class="heading-style">
            <tr>
                <th>National Id no.</th>
                <th>Front Image</th>
                <th>Back Image</th>
            </tr>
        </thead>

        <tbody class="body-style">
            <tr>
                <td>{{ $employee->national_id }}</td>
                <td><img src="{{ s3FileToBase64($employee->front_image) }}" alt="" style="width: 250px; border: 1px solid rgb(158, 158, 158)"></td>
                <td><img src="{{ s3FileToBase64($employee->back_image) }}" alt="" style="width: 250px; border: 1px solid rgb(158, 158, 158)"></td>
            </tr>
        </tbody>
    </table>

    <table class="table" border="1">
        <thead class="heading-style">
            <tr>
                <th>Signature</th>
                <th>Address Proof</th>
                <th>Other Documents</th>
            </tr>
        </thead>

        <tbody class="body-style">
            <tr>
                <td><img src="{{ s3FileToBase64($employee->signature) }}" alt="" style="width: 150px;"></td>
                <td>{{ $employee->address_proof }}</td>
                <td>{{ $employee->other_documents }}</td>
            </tr>
        </tbody>
    </table>

</body>
</div>
</div>
</div>
