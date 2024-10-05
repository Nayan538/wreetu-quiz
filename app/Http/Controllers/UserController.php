<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Branch;
use App\Models\AccessControl\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Service variable
     *
     * @var UserService
     */
    private $service; 
    function __construct(UserService $service)
    {
        $this->service = $service;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = $this->service->getAll();

        return view("users.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::get();
        $data['branches'] = Branch::get();

        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required',
            'branch_id' => 'required|exists:branches,id',
            'status' => 'required',
        ]);
        $this->service->store($validate);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data['user'] = $this->service->show($id);

        return view("users.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data['user'] = $user;
        $data['roles'] = Role::get();
        $data['branches'] = Branch::get();
        return view("users.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required',
            'branch_id' => 'required|exists:branches,id',
            'status' => 'required|numeric',
        ]);

        $this->service->update($user, $validate);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->service->delete($user);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
