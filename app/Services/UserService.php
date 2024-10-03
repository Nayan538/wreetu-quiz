<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    
    public function getAll(int $limit = 20) {
        return User::query()->paginate($limit);
    }
    
    public function store(array $data)
    {        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password_string' => $data['password'],
            'password' => bcrypt($data['password']),
            'branch_id' => $data['branch_id'],
            'status' => $data['status'],
        ]);
    }
    public function update(User $user, array $data)
    {
        $user->update($data);
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
