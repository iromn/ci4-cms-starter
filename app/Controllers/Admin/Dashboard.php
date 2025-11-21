<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $blogModel = new \App\Models\BlogModel();

        $data = [
            'totalUsers' => $userModel->countAllResults(),
            'totalBlogs' => $blogModel->countAllResults(),
            'pendingReviews' => $blogModel->where('status', 'review')->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
}
