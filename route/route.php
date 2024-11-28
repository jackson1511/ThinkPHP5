<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
Route::get('/test-connection','index/testConnection');


/** User Route */

// RESTful routes
Route::get('users/active', 'user/active');            // Get active users

Route::get('users/:id', 'user/show')->pattern(['id' => '\d+']); // Show a specific user
Route::get('users', 'user/index');                     // List all users
Route::post('users', 'user/store');                   // Create a new user
Route::put('users/:id', 'user/update')->pattern(['id' => '\d+']); // Update a user
Route::delete('users/:id', 'user/delete')->pattern(['id' => '\d+']); // Delete a user

// Special actions
Route::patch('users/:id/disable', 'user/disable')->pattern(['id' => '\d+']); // Disable a user
Route::patch('users/:id/enable', 'user/enable')->pattern(['id' => '\d+']); // Disable a user

/** View */
Route::get('/dashboard','dashboard/index');




