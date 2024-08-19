<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class DeptUserChart extends BaseController
{
    public function index()
    {
        return view('users/showchart');
    }

    public function showchart()
    {
        $usermodel = new UserModel();
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $query = $builder
            ->select('departments.dept_name as dept_name, count(*) as num_of_users')
            ->join('departments', 'departments.dept_id = user.fk_dept_id')
            // ->where('user.status', 1)
            ->groupBy('departments.dept_name')
            ->orderBy('departments.dept_name', 'asc')
            ->get();
        $records = $query->getResult();
        // $records = $query->findAll();
        // $records = $query->getResultArray();

        $results = [];
        foreach ($records as $record) {
            $results[] = array(
                'dept_name' => $record->dept_name,
                'num_of_users' => $record->num_of_users,
            );
        }

        $data['results'] = $results;
        // dd($data);

        return view('users/showchart', $data);
    }
}
