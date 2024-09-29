<?php

namespace Modules\HRMS\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\CompanyInfo;
use Modules\HRMS\Models\Employee;
use Modules\HRMS\Models\Settings\Department;
use Modules\HRMS\Models\Settings\Designation;
use App\Models\AccessControl\Branch;
use Modules\HRMS\Services\EmployeeService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class EmployeeController extends Controller
{

    /**
     * Service variable
     *
     * @var EmployeeService
     */
    private $service; 

    /**
     * User service
     *  @var UserService 
     */
     private $userService;

    function __construct(EmployeeService $service, UserService $userService)
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->middleware('permited');

    }
    
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $data['employees'] = $this->service->getAll();
        $data['company_info'] = CompanyInfo::first();

        if ($request->export == "pdf") {
            set_time_limit(1000);
            $html = view('HRMS::employees.indexView', $data)->render();

            // Set Dompdf options
            $options = new Options();
            $options->setIsHtml5ParserEnabled(true);
            $options->setIsRemoteEnabled(true);
            
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            return $dompdf->stream('employee_list_' . date('Y-m-d') . '.pdf', ['Attachment' => false]);
        }

        return view("HRMS::employees.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['branches'] = Branch::all();
        $data['employees'] = Employee::all();
        $data['designations'] = Designation::where('status', 1)->get();
        $data['departments'] = Department::where('status', 1)->get();

        return view('HRMS::employees.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        /**
         * "photograph" => Illuminate\Http\UploadedFile {#1537 ▶}
         * "resume" => Illuminate\Http\UploadedFile {#1588 ▶}
         * "front_image" => Illuminate\Http\UploadedFile {#1589 ▶}
         * "back_image" => Illuminate\Http\UploadedFile {#1590 ▶}
         * "signature" => Illuminate\Http\UploadedFile {#1546 ▶}
         * "address_proof" => Illuminate\Http\UploadedFile {#1598 ▶}
         * "other_documents" => Illuminate\Http\UploadedFile {#1597 ▶}
        */
        // is it string
        $validate = $request->validate([
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'date_of_birth' => 'nullable|date',
            'office_phone' =>  ['required', 'regex:/^(?:\+?88|00)?01[3-9]\d{8}$/','unique:employees,office_phone,NULL,id,deleted_at,NULL'],
            'personal_mobile' => 'required|string|max:255',
            'alternate_phone' => 'nullable|string|max:255',
            'email_address' => 'required|email|max:255|unique:users,email',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'present_address' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'blood_group' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'photograph' => 'nullable|image',
            'national_id' => 'required|string|max:255',
            'front_image' => 'nullable|image',
            'back_image' => 'nullable|image',
           
        ]);
       
        $educationsDetails = $request->validate([
            'degree_title.*' => 'nullable|string|max:255',
            'institute_name.*' => 'nullable|string|max:255',
            'group.*' => 'nullable|string|max:255',
            'duration.*' => 'nullable|string|max:255',
            'passing_year.*' => 'nullable|string|max:255',
            'result.*' => 'nullable|string|max:255',
            'certificate_upload.*' => 'nullable|file',
        ]);

        $employementDetails = $request->validate([
            'card_no' => 'nullable|string|max:255',
            'date_of_joining' => 'nullable|date',
            'employment_type_id' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'nullable|exists:designations,id',
            'user_branch_id' => 'nullable|exists:branches,id',
            'supervisor' => 'nullable|exists:employees,id',
            
        ]);

        $user = $request->validate([
            'system_username' => 'required|string|max:255',
            'system_password' => 'nullable|string|max:255',
            'user_branch_id' => 'nullable|exists:branches,id',
        ]);
       
        $result = $this->service->create($validate,  $educationsDetails, $employementDetails, $user);
            
        return redirect()->route('hrm.employees.edit', $result['employee']->id)->with('success', 'Employee created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    // public function show( $id)
    // {
    //     $data['employee'] = $this->service->show($id);
        
    //     return view("HRMS::employees.show", $data);
    // }


    /**
     * Convert image to base64 string
     *
     * @param string $path
     * @return string|null
     */
    private function convertImageToBase64($path)
    {
        $fileContents = file_exists($path) ? file_get_contents($path) : null;

        if ($fileContents !== false) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($fileContents);
            return $base64;
        }

        return null;
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Request $request)
    {
        $employee = $this->service->show($id);

        // Convert images to base64
        // $customer->profile_picture_base64 = $this->convertImageToBase64(public_path($customer->profile_picture));
        // $customer->nid_base64 = $this->convertImageToBase64(public_path($customer->nid));
        // $customer->front_image_base64 = $this->convertImageToBase64(public_path($customer->front_image));
        // $customer->back_image_base64 = $this->convertImageToBase64(public_path($customer->back_image));
        // $customer->visiting_card_front_base64 = $this->convertImageToBase64(public_path($customer->visiting_card_front));
        // $customer->visiting_card_back_base64 = $this->convertImageToBase64(public_path($customer->visiting_card_back));
        // $customer->trade_license_base64 = $this->convertImageToBase64(public_path($customer->trade_license));
        // $customer->signature_base64 = $this->convertImageToBase64(public_path($customer->signature));

        $data = [
            'employee' => $employee,
        ];

        if ($request->export == "pdf") {
            set_time_limit(1000);
            $html = view('HRMS::employees.view', $data)->render();

            // Set Dompdf options
            $options = new Options();
            $options->setIsHtml5ParserEnabled(true);
            $options->setIsRemoteEnabled(true);
            
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            return $dompdf->stream('employee_' . $data['employee']->company_name . '.pdf', ['Attachment' => false]);
        }

        return view("HRMS::employees.show", $data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
   
        $data['employee'] = Employee::find($id);
        $data['branches'] = Branch::all();
        $data['employees'] = Employee::all();
        $data['designations'] = Designation::where('status', 1)->get();
        $data['departments'] = Department::where('status', 1)->get();

        return view("HRMS::employees.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validate = $request->validate([
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'date_of_birth' => 'nullable|date',
            'office_phone' =>  ['required', 'regex:/^(?:\+?88|00)?01[3-9]\d{8}$/'],
            'personal_mobile' => 'required|string|max:255',
            'alternate_phone' => 'nullable|string|max:255',
            'email_address' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'present_address' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'blood_group' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'photograph' => 'nullable|image',
            'resume' => 'nullable|file',
            'national_id' => 'required|string|max:255',
            'front_image' => 'nullable|image',
            'back_image' => 'nullable|image',
            'signature' => 'nullable|image',
            'address_proof' => 'nullable|file',
            'other_documents' => 'nullable|file',
            'bank_name' => 'nullable|string|max:255',
            'account_holder_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'routing_number' => 'nullable|string|max:255',
            'etin_number' => 'nullable|string|max:255',
            'epf_number' => 'nullable|string|max:255',
            'basic_salary' => 'nullable|numeric',
            'gross_salary' => 'nullable|string|max:255',
            'insurance_coverage' => 'nullable',
            'leave_entitlement' => 'nullable|string|max:255',
            'other_benefits' => 'nullable|string|max:255',
            'email_accounts' => 'nullable|string|max:255',
            'software_access' => 'nullable|string|max:255',
            'additional_notes' => 'nullable|string|max:255',
        ]);
       
        $educationsDetails = $request->validate([
            'degree_title.*' => 'nullable|string|max:255',
            'institute_name.*' => 'nullable|string|max:255',
            'group.*' => 'nullable|string|max:255',
            'duration.*' => 'nullable|string|max:255',
            'passing_year.*' => 'nullable|string|max:255',
            'result.*' => 'nullable|string|max:255',
            'certificate_upload.*' => 'nullable|file',
        ]);

        $employementDetails = $request->validate([
            'card_no' => 'nullable|string|max:255',
            'date_of_joining' => 'nullable|date',
            'employment_type_id' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'nullable|exists:designations,id',
            'user_branch_id' => 'nullable|exists:branches,id',
            'supervisor' => 'nullable|exists:employees,id',
            
        ]);
        $result = $this->service->update($employee, $validate, $educationsDetails, $employementDetails);

        // return redirect()->route('hrm.employees.index')->with('success', 'Employee updated successfully.');
        return redirect()->route('hrm.employees.edit', $employee->id)->with('success', 'Employee updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->service->delete($employee);

        return redirect()->route('hrm.employees.index')->with('success', 'Employee deleted successfully.');
    }
}
