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
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'full_pager');

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

    public function edit($id = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employees');
        $employee = $builder
            ->select('*')
            ->where('id', $id)
            ->get()
            ->getResultArray();
        // dd($employee);
        return view('employees/edit', ['employee' => $employee[0]]);
    }

    public function create()
    {
        helper('form');
        return view('employees/create');
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employees');
        helper('form');

        $data = $this->request->getPost([
            'name',
            'email',
            'phone',
            'address'
        ]);

        if (! $this->validateData($data, [
            'name' => 'required|min_length[8]',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric',
            'address' => 'required',
        ])) {
            return $this->create();
        }

        $post = $this->validator->getValidated();

        $create = $builder->insert([
            'name' => $post['name'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'address' => $post['address']
        ]);

        if ($create) {
            session()->setFlashdata('message', 'Successfully created');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Failed to create');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        return redirect()->to('employees');
    }

    public function update($id = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employees');
        helper('form');

        $employee = $builder
            ->select('*')
            ->where('id', $id)
            ->get()
            ->getResultArray();

        $data = $this->request->getPost([
            'name',
            'email',
            'phone',
            'address'
        ]);

        if (! $this->validateData($data, [
            'name' => 'required|min_length[8]',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric',
            'address' => 'required',
        ])) {
            // return $this->edit();
            return view('employees/edit', ['employee' => $employee[0]]);
        }

        $post = $this->validator->getValidated();

        $update = $builder->set([
            'name' => $post['name'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'address' => $post['address']
        ])->where('id', $id)->update();

        if ($update) {
            session()->setFlashdata('message', 'Successfully updated');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Failed to update');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        // dd($update);
        return redirect()->to('employees');
    }

    public function destroy($id = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employees');
        $deleteEmp = $builder->where('id', $id)->delete();
        if ($deleteEmp) {
            session()->setFlashdata('message', 'Successfully deleted');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Failed to delete');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->to('employees');
    }
}
