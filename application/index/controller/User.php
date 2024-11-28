<?php

namespace app\index\controller;

use think\Db;


class User
{
    // Read users from the 'user' table
    public function index()
    {
        // Fetch all users
        $users = Db::name('user')->select();  // Retrieves all records
        
        // Return the data as JSON
        // return json($users); 

        $username = 'sohcoeun';

        return view('user/index', compact('username', 'users'));
    }

    // Read a user by ID
    public function show($id)
    {
        $user = Db::name('user')->where('id', $id)->find();

        if (!$user || $user['status'] === 0) {
            return json(['message' => 'User not found']);
        }

        return json($user);        
    }

    // Read all users active
    public function active()
    {
        $users = Db::name('user')->where('status', 1)->select();
        return json($users);
    }

    // disable user
    public function disable($id)
    {
        $result = Db::name('user')->where('id', $id)->update(['status' => 0]);
        return json($result ? ['message' => 'User disabled successfully'] : ['message' => 'User not found']);
    }

    // enable user
    public function enable($id)
    {
        $result = Db::name('user')->where('id', $id)->update(['status' => 1]);
        return json($result ? ['message' => 'User enabled successfully'] : ['message' => 'User not found']);
    }



    // Create a new user (insert)
    public function store()
    {
        // Data to insert
        $data = [
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'gender'     => 'Male',
            'status'     => 1  // Active
        ];

        // Insert data into the 'user' table
        $result = Db::name('user')->insert($data);

        // Check if insert was successful
        if ($result) {
            return json(['message' => 'User created successfully']);
        } else {
            return json(['message' => 'Failed to create user']);
        }
    }

    // Update user information
    public function update($id)
    {
        // Data to update
        $data = [
            'first_name' => 'Jane Update',
            'last_name'  => 'Smith',
            'gender'     => 'Female',
        ];

        $result = Db::name('user')->where('id', $id)->update($data);

        return json($result ? ['message' => 'User updated successfully'] : ['message' => 'User not found or no change']);
    }

    // Delete a user
    public function delete($id)
    {
        $result = Db::name('user')->where('id', $id)->delete();
        return json($result ? ['message' => 'User deleted successfully'] : ['message' => 'User not found']);
    }
    
}