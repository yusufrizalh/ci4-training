<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class User extends BaseController
{
    public function index()
    {
        // $pager = Services::pager();
        $usermodel = new UserModel();
        $users = $usermodel->select('users.*, departments.dept_name')
            ->join('`departments', 'departments.dept_id = users.fk_dept_id')
            ->orderBy('users.created_at', 'DESC')
            ->where('users.status', 1)
            ->paginate(6, 'group1');
        $data = [
            'users' => $users,
            'pager' => $usermodel->pager,
            'currentPage' => $usermodel->pager->getCurrentPage('group1'),
            'totalPages' => $usermodel->pager->getPageCount('group1'),
            'pageHeading' => 'Users Data',
            'subHeading' => 'Users Data',
            'typography' => Services::typography(),
        ];
        // dd($data);
        return view('users/index', $data);
    }

    public function show($username = null)
    {
        $usermodel = new UserModel();
        $query_dept = $usermodel
            ->select('users.*, departments.dept_name')
            ->join('departments', 'departments.dept_id = users.fk_dept_id')
            ->orderBy('users.username', 'ASC')
            ->where('users.status', 1)
            ->where('users.username', $username)
            ->paginate(6, 'group1');
        $query_userskills = $usermodel
            ->select('users.*, skills.skill_name')
            ->join('userskills', 'userskills.fk_user_id = users.id')
            ->join('skills', 'skills.skill_id = userskills.fk_skill_id')
            ->where('users.status', 1)
            ->where('users.username', $username)
            ->paginate(6, 'group1');
        $data = [
            'users' => $query_dept,
            'userskills' => $query_userskills,
            'pager' => $usermodel->pager,
            'currentPage' => $usermodel->pager->getCurrentPage('group1'),
            'totalPages' => $usermodel->pager->getPageCount('group1'),
            'pageHeading' => 'Users Data',
            'subHeading' => 'Users Data',
            'typography' => Services::typography(),
        ];
        // dd($data);
        return view('users/show', $data);
    }

    public function showdept($department = null)
    {
        $usermodel = new UserModel();
        $query = $usermodel
            ->select('departments.dept_name, users.username, users.usermail, users.status')
            ->join('`departments', 'departments.dept_id = users.fk_dept_id')
            ->where('users.status', 1)
            ->where('departments.dept_name', $department)
            ->findAll();
        $data = ['department' => $query];
        // dd($data);
        return view('users/showdept', $data);
    }

    public function create()
    {
        helper('form');
        return view('users/create');
    }
    public function store()
    {
        //
    }
    public function edit($id = null)
    {
        helper('form');
        return view('users/edit');
    }
    public function update($id = null)
    {
        //
    }
    public function destroy($id = null)
    {
        //
    }
}
