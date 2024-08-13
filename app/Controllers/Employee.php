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

        $perpage = 3;
        $page = $this->request->getVar('page') ?? 1;
        $offset = ($page - 1) * $perpage;
        $total = $builder->countAllResults();
        $pager_links = $pager->makeLinks($page, $perpage, $total);

        $employees = $builder->select('*')
            ->orderBy('created_at', 'DESC')
            ->get($perpage, $offset)
            ->getResultArray();

        $data = [
            'employees' => $employees,
            'pager_links' => $pager_links,
        ];

        return view('employees/index', $data);
    }
}
