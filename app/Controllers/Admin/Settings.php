<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Settings extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to('login');
        }

        $data['user'] = $this->userModel->find($userId);
        return view('admin/settings', $data);
    }

    public function update()
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to('login');
        }

        $rules = [
            'username' => "required|min_length[3]|is_unique[users.username,id,{$userId}]",
            'email'    => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'password' => 'permit_empty|min_length[6]',
            'pass_confirm' => 'matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($userId, $data);

        // Update session data if username/email changed
        session()->set([
            'username' => $data['username'],
            'email' => $data['email']
        ]);

        return redirect()->to('admin/settings')->with('message', 'Profile updated successfully');
    }
}
