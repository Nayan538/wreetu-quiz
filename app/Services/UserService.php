<?php

namespace App\Services;

use App\Models\AccessControl\Role;
use App\Models\User;

class UserService
{
    
    public function getAll(int $limit = 20) {
        return User::query()->paginate($limit);
    }
    
    public function store(array $data)
    {        
        $user =User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password_string' => $data['password'],
            'password' => bcrypt($data['password']),
            'branch_id' => $data['branch_id'],
            'status' => $data['status'],
        ]);

        Role::create([
            'user_id' => $user->id,
            'role_id' => $data['role_id'],
        ]);

        return $user;
    }
    public function update(User $user, array $data)
    {
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password_string' => $data['password'],
            'password' => bcrypt($data['password']),
            'branch_id' => $data['branch_id'],
            'status' => $data['status'],
        ]);
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }
}
