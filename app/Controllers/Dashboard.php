<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();

        $builderUsers = $db->table('user');
        $countUsers = $builderUsers
            ->select('count(id) as count_users')
            ->where('status = 1')
            ->get()
            ->getResultArray();
        // dd($countUsers[0]);
        $builderDepartments = $db->table('departments');
        $countDepartments = $builderDepartments
            ->select('count(dept_id) as count_departments')
            ->get()
            ->getResultArray();
        // dd($countUsers[0]);
        $builderSkills = $db->table('skills');
        $countSkills = $builderSkills
            ->select('count(skill_id) as count_skills')
            ->get()
            ->getResultArray();
        // dd($countUsers[0]);

        return view('auth/dashboard/index', [
            'session' => $session,
            'countUsers' => $countUsers[0],
            'countDepartments' => $countDepartments[0],
            'countSkills' => $countSkills[0],
        ]);
    }

    public function countUsers()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $countUsers = $builder->select('count(id) as count_users')
            ->where('status = 1')
            ->get()
            ->getResultArray();
        dd($countUsers);
    }
}
