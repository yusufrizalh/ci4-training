<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use CodeIgniter\HTTP\ResponseInterface;

class Department extends BaseController
{
    public function index()
    {
        $departmentmodel = new DepartmentModel();
        $departments = $departmentmodel->select('departments.*')
            ->orderBy('departments.dept_name', 'ASC')
            ->findAll();
        $data = ['departments' => $departments];
        // dd($data);
        return view('departments/index', $data);
    }
}
