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

        // Or, fetch a single user by ID
        $user = Db::name('user')->where('id', 1)->find();  // Find user with ID = 1

        return json($users);  // Return the data as JSON
    }

    // Create a new user (insert)
    public function create()
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
    
}