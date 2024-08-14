<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Employee extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employees');
        $pager = service('pager');

        $perPage = 6;
        $page = $this->request->getVar('page') ?? 1;
        $offset = ($page - 1) * $perPage;
        $total = $builder->countAllResults();
        $pager_links = $pager->makeLinks($page, $perPage, $total);

        $employees = $builder->select('*')
            ->orderBy('created_at', 'DESC')
            ->get($perPage, $offset)
            ->getResultArray();

        $data = [
            'employees' => $employees,
            'pager_links' => $pager_links,
        ];

        return view('employees/index', $data);
    }

    public function show($name = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employees');
        $employee = $builder
            ->select('id, name, email, phone, address')
            ->where('name', $name)
            ->get()
            ->getResultArray();
        // dd($employee);
        return view('employees/show', ['employee' => $employee[0]]);
    }
}
