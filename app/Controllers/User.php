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
        $users = $usermodel->orderBy('created_at', 'DESC')
            ->where('status', 1)
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
        return view('users/show');
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
