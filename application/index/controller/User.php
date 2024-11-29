<?php

namespace app\index\controller;

use think\Db;
use think\Request;
use think\facade\Validate;
use think\Controller;


class User extends Controller
{
    /** List all users */
    public function index()
    {
        $users = Db::name('user')->select();
                
        return view('user/index', compact('users'));
    }

    /** Find a user */
    public function show($id)
    {
        $user = Db::name('user')->where('id', $id)->find();

        if (!$user || $user['status'] === 0) {
            return json(['message' => 'User not found']);
        }

        return json($user);        
    }

    /** List active users */
    public function active()
    {
        $users = Db::name('user')->where('status', 1)->select();
        return json($users);
    }

    /** Disable a user */
    public function disable($id)
    {
        $result = Db::name('user')->where('id', $id)->update(['status' => 0]);
        return json($result ? ['message' => 'User disabled successfully'] : ['message' => 'User not found']);
    }

    /**  Enable a user */
    public function enable($id)
    {
        $result = Db::name('user')->where('id', $id)->update(['status' => 1]);
        return json($result ? ['message' => 'User enabled successfully'] : ['message' => 'User not found']);
    }


    /** Show create user form */
    public function create()
    {
        return view('user/create-form');
    }

    /** Save new user */
    public function store(Request $request)
    {
        $data = $request->post();

        $result = Db::name('user')->insert($data);

        if ($result) {
            return redirect('user/index');
        } else {
            return $this->error('An error occurred while saving the user. Please try again later.');
        }
    }

    /** Show edit user form */
    public function edit($id)
    {
        $user = Db::name('user')->where('id', $id)->find();

        if (!$user) {
            return $this->error('User not found!');
        }

        return view('user/edit-form', compact('user'));
    }

    /** Update user */
    public function update($id, Request $request)
    {
        $data = $request->post();

        $result = Db::name('user')->where('id', $id)->update($data);

        if ($result === false) {
            return $this->error('An error occurred while updating the user. Please try again later.', 'user/index', 5); // Redirect after 5 seconds
        }
        
        return redirect('user/index');
    }

    /** Delete user */
    public function delete($id)
    {
        $result = Db::name('user')->where('id', $id)->delete();

        // $result : 1 (success) or 0 (fail)
        return $this->error($result ? 'User deleted successfully!' : 'Failed to delete user.', 'user/index', 5);
    }
    
}