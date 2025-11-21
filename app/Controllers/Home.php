<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Home extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        $data['featured_blogs'] = $this->blogModel->where('status', 'published')
            ->orderBy('created_at', 'DESC')
            ->findAll(3);
        return view('home', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        $data['blogs'] = $this->blogModel->where('status', 'published')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        return view('blog/index', $data);
    }

    public function blogDetail($slug)
    {
        $blog = $this->blogModel->where('slug', $slug)->first();

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Check if published
        if ($blog['status'] !== 'published') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['blog'] = $blog;
        return view('blog/detail', $data);
    }

    public function preview($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['blog'] = $blog;
        return view('blog/detail', $data);
    }
}
