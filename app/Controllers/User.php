<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserskillsModel;
use Config\Services;

class User extends BaseController
{
    public function index()
    {
        // $pager = Services::pager();
        $usermodel = new UserModel();
        $users = $usermodel->select('user.*, departments.dept_name')
            ->join('`departments', 'departments.dept_id = user.fk_dept_id')
            ->orderBy('user.created_at', 'DESC')
            // ->where('user.status', 1)
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
            ->select('user.*, departments.dept_name')
            ->join('departments', 'departments.dept_id = user.fk_dept_id')
            ->orderBy('user.username', 'ASC')
            // ->where('user.status', 1)
            ->where('user.username', $username)
            ->paginate(6, 'group1');
        $query_userskills = $usermodel
            ->distinct()
            ->select('user.*, skills.skill_name')
            ->join('userskills', 'userskills.fk_user_id = user.id')
            ->join('skills', 'skills.skill_id = userskills.fk_skill_id')
            // ->where('user.status', 1)
            ->where('user.username', $username)
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

    public function switchStatus($username = null)
    {
        $usermodel = new UserModel();
    }

    public function showdept($department = null)
    {
        $usermodel = new UserModel();
        $query = $usermodel
            ->select('departments.dept_name, user.username, user.usermail, user.status')
            ->join('`departments', 'departments.dept_id = user.fk_dept_id')
            // ->where('user.status', 1)
            ->where('departments.dept_name', $department)
            ->findAll();
        $data = ['department' => $query];
        // dd($data);
        return view('users/showdept', $data);
    }
    public function showskill($skill = null)
    {
        $usermodel = new UserModel();
        $query = $usermodel
            ->select('user.*, skills.skill_name')
            ->join('userskills', 'userskills.fk_user_id = user.id')
            ->join('skills', 'skills.skill_id = userskills.fk_skill_id')
            // ->where('user.status', 1)
            ->where('skills.skill_name', $skill)
            ->findAll();
        $data = ['skill' => $query];
        // dd($data);
        return view('users/showskill', $data);
    }

    public function create()
    {
        helper('form');
        return view('users/create');
    }
    public function store()
    {
        $usermodel = new UserModel();
        $userskillsmodel = new UserskillsModel();
        $db = \Config\Database::connect();
        $builder = $db->table('user');

        $data = $this->request->getPost([
            'username',
            'usermail',
            'userpass',
            'fk_dept_id',
            'skills[]',
        ]);

        if (! $this->validateData($data, [
            'username' => 'required|min_length[8]|max_length[20]',
            'usermail' => 'required|valid_email|is_unique[user.usermail]',
            'userpass' => 'required|min_length[8]',
            'fk_dept_id' => 'required',
            'skills[]' => 'required',
        ])) {
            return $this->create();
        };

        $post = $this->validator->getValidated();

        $create = $usermodel->insert([
            'username' => $post['username'],
            'usermail' => $post['usermail'],
            'userpass' => password_hash($post['userpass'], PASSWORD_DEFAULT),
            'fk_dept_id' => $post['fk_dept_id'],
        ]);
        $fk_user_id = $usermodel->getInsertID();
        $checkbox = $post['skills[]'];
        for ($i = 0; $i < count($checkbox); $i++) {
            $skill_id = $checkbox[$i];
            $createuserskills = $userskillsmodel->save([
                'fk_user_id' => $fk_user_id,
                'fk_skill_id' => $skill_id,
            ]);
            // $startId = $startId++;
        }

        if ($create && $createuserskills) {
            session()->setFlashdata('message', 'Successfully created new user');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Failed to create new user');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        return redirect()->to('users');
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

    public function searchuser()
    {
        $request = service('request');
        $searchdata = $request->getGet();
        $search = "";

        if (isset($searchdata) && isset($searchdata['search'])) {
            $search = $searchdata['search'];
        }

        $usermodel = new UserModel();

        if ($search == "") {
            $alldata = $usermodel
                ->select('user.*, departments.dept_name')
                ->join('`departments', 'departments.dept_id = user.fk_dept_id')
                ->orderBy('user.created_at', 'DESC')
                // ->where('user.status', 1)
                ->paginate(6, 'group1');
        } else {
            $alldata = $usermodel
                ->select('user.*, departments.dept_name')
                ->orLike('user.username', $search)
                ->orLike('user.usermail', $search)
                ->orLike('departments.dept_name', $search)
                ->join('`departments', 'departments.dept_id = user.fk_dept_id')
                ->orderBy('user.created_at', 'DESC')
                // ->where('user.status', 1)
                ->paginate(6, 'group1');
        }

        $data = [
            'users' => $alldata,
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

    public function register()
    {
        helper(['form']);
        return view('auth/register');
    }

    public function registerUser()
    {
        $usermodel = new UserModel();
        $db = \Config\Database::connect();
        $builder = $db->table('user');

        $data = $this->request->getPost([
            'username',
            'usermail',
            'userpass',
            'confirmpassword'
        ]);

        if (! $this->validateData($data, [
            'username' => 'required|min_length[8]|max_length[20]',
            'usermail' => 'required|valid_email|is_unique[user.usermail]',
            'userpass' => 'required|min_length[8]',
            'confirmpassword' => 'matches[userpass]',
        ])) {
            return $this->register();
        };

        $post = $this->validator->getValidated();

        $register = $usermodel->insert([
            'username' => $post['username'],
            'usermail' => $post['usermail'],
            'userpass' => password_hash($post['userpass'], PASSWORD_DEFAULT),
        ]);

        if ($register) {
            session()->setFlashdata('message', 'Successfully registered');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Failed to register');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        return redirect()->to('auth/login');
    }

    public function login()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function loginUser()
    {
        $usermodel = new UserModel();
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $session = session();

        $data = $this->request->getPost([
            'usermail',
            'userpass',
        ]);

        if (! $this->validateData($data, [
            'usermail' => 'required|valid_email',
            'userpass' => 'required',
        ])) {
            return $this->login();
        };

        $post = $this->validator->getValidated();

        $login = $usermodel->where('usermail', $post['usermail'])->first();

        if ($login) {
            $password = $login['userpass'];
            $authPassword = password_verify($post['userpass'], $password);
            if ($authPassword) {
                $sessionData = [
                    'username' => $login['username'],
                    'usermail' => $login['usermail'],
                    'isLoggedIn' => TRUE,
                ];
                $session->set($sessionData);
                return redirect()->to('auth/dashboard');
            } else {
                $session->setFlashdata('message', 'Password is incorrect');
                $session->setFlashdata('alert-class', 'alert-danger');
                return redirect()->to('auth/login');
            }
        } else {
            $session->setFlashdata('message', 'Email does not exist');
            $session->setFlashdata('alert-class', 'alert-danger');
            return redirect()->to('auth/login');
        }
    }

    public function logoutUser()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('auth/login');
    }
}
