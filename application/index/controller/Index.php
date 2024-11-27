<?php
namespace app\index\controller;

use think\Db;

class Index
{
    public function index()
    {
        return 'Home';
    }

    public function testConnection()
    {
        try {
            // Try to execute a simple query to check the connection
            $result = Db::query('SELECT 1');
            
            // If the query executes successfully, return a success message
            if ($result !== false) {
                return json(['message' => 'Database connection is working!']);
            }
        } catch (\Exception $e) {
            // If there's an error, catch the exception and return an error message
            return json(['message' => 'Database connection failed', 'error' => $e->getMessage()]);
        }
    }
}
