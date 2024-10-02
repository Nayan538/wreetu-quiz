<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|password',
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
        return view("users.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            //validate rules
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
