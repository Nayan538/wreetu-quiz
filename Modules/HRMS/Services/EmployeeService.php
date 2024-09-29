<?php

namespace Modules\HRMS\Services;

use App\Models\AccessControl\Branch;
use App\Models\User;
use Modules\HRMS\Models\Employee;
use App\Traits\S3FileHandler;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\HRMS\Models\Settings\Designation;

class EmployeeService
{
    use S3FileHandler;
    
    public function getAll(int $limit = 20) {
        return Employee::query()
        ->searchByFields(['full_name', 'personal_mobile', 'present_address'])
        ->paginate($limit);
    }
    
    public function create(array $data, $educationsDetails, $employementDetails, $user)
    {

        $result = [];
        $branch = null;
        DB::beginTransaction();

        $user = User::create([
            'name' => $user['system_username'],
            'email' => $data['email_address'],
            'password' => bcrypt($user['system_password']),
            'branch_id' => $user['user_branch_id'],
        ]);
        $result['user'] = $user;
        $filesToUpload = [
            'photograph' => 'photograph',
            'resume' => 'resume',
            'front_image' => 'front_image',
            'back_image' => 'back_image',
        ];

        foreach ($filesToUpload as $file => $folder) {
            if (isset($data[$file])) {
                $data[$file] = $this->uploadFile($data[$file], $folder, $file === 'other_documents');
            }
        }

        $data['user_id'] = $user->id;
        $result['employee'] = Employee::create($data);

        foreach ($educationsDetails['degree_title'] as $key => $degree_title) {
            $educationsDetails['certificate_upload'][$key] = isset($educationsDetails['certificate_upload'][$key]) ? $this->uploadFile($educationsDetails['certificate_upload'][$key], 'education_certificate', true) : null;
            $result['employee']->educationDetails()->create([
                'degree_title' => $degree_title,
                'institute_name' => $educationsDetails['institute_name'][$key],
                'group' => $educationsDetails['group'][$key],
                'duration' => $educationsDetails['duration'][$key],
                'passing_year' => $educationsDetails['passing_year'][$key],
                'result' => $educationsDetails['result'][$key],
                'certificate_upload' => $educationsDetails['certificate_upload'][$key],
            ]);
        }

        $result['employee']->employementDetails()->create([
            'employee_id' => $result['employee']->id,
            'card_no' => $employementDetails['card_no'],
            'date_of_joining' => $employementDetails['date_of_joining'],
            'department_id' => $employementDetails['department_id'],
            'designation_id' => $employementDetails['designation_id'],
            'branch_id' =>  $employementDetails['user_branch_id'],
            'supervisor' => $employementDetails['supervisor'],
        ]);
        // dd($result);
        DB::commit();
        return $result;
    }

    public function update(Employee $employee, array $data, array $educationsDetails, array $employementDetails)
    {
        $filesToUpload = [
            'photograph' => 'photograph',
            'resume' => 'resume',
            'front_image' => 'front_image',
            'back_image' => 'back_image',
            'signature' => 'signature',
            'address_proof' => 'address_proof',
            'other_documents' => 'other_documents',
        ];
    
        foreach ($filesToUpload as $file => $folder) {
            if (isset($data[$file])) {
                try {
                    $data[$file] = $this->uploadFile($data[$file], $folder, $file === 'other_documents');
                } catch (Exception $e) {
                    // Log the error or throw an exception to roll back the update process
                }
            }
        }
    
        $employee->update($data);

        $employee->educationDetails()->delete();

        foreach ($educationsDetails['degree_title'] as $key => $degree_title) {
            $employee->educationDetails()->create([
                'degree_title' => $degree_title,
                'institute_name' => $educationsDetails['institute_name'][$key],
                'group' => $educationsDetails['group'][$key],
                'duration' => $educationsDetails['duration'][$key],
                'passing_year' => $educationsDetails['passing_year'][$key],
                'result' => $educationsDetails['result'][$key],
            ]);
        }
    
        $employee->employementDetails()->update([
            'card_no' => $employementDetails['card_no'],
            'date_of_joining' => $employementDetails['date_of_joining'],
            'employment_type_id' => $employementDetails['employment_type_id'],
            'department_id' => $employementDetails['department_id'],
            'designation_id' => $employementDetails['designation_id'],
            'supervisor' => $employementDetails['supervisor'],
            'branch_id' => $employementDetails['user_branch_id'], // Assuming this is the correct key
        ]);
    
        return $employee;
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }

    public function show($id)
    {
        return Employee::with(['educationDetails', 'employementDetails.branch'])->findOrFail($id);
    }
}
