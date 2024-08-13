<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Contact extends BaseController
{
    public function index()
    {
        return view('contact');
    }

    public function store()
    {
        helper('form');
        $input = $this->request->getPost([
            'name',
            'email',
            'message'
        ]);

        if (!$this->validateData($input, [
            'name' => 'required|min_length[8]',
            'email' => 'required|valid_email',
            'message' => 'required|max_length[100]',
        ])) {
            return $this->index();
        }

        $post = $this->validator->getValidated();
        dd('name', $post['name']);
        dd('email', $post['email']);
        dd('message', $post['message']);
        // redirect()->to(base_url("/"));
    }
}
