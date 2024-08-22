<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Skill extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $skillbuilder = $db->table('skills');
        $skills = $skillbuilder->select('skills.*')
            ->orderBy('skills.skill_name', 'ASC')
            ->get()->getResultArray();
        $data = ['skills' => $skills];
        // dd($data);
        return view('skills/index', $data);
    }
}
