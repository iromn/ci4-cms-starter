<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class Blogs extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        $data['blogs'] = $this->blogModel->findAll();
        return view('admin/blogs/index', $data);
    }

    public function create()
    {
        return view('admin/blogs/create');
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[3]',
            'slug'        => 'required|min_length[3]|is_unique[blogs.slug]',
            'content'     => 'required',
            'status'      => 'required|in_list[draft,review,published]',
            'hero_image'  => 'is_image[hero_image]|max_size[hero_image,2048]',
            'author_name' => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'slug'        => url_title($this->request->getPost('slug'), '-', true),
            'content'     => $this->request->getPost('content'),
            'status'      => $this->request->getPost('status'),
            'author_name' => $this->request->getPost('author_name') ?: null,
        ];

        $file = $this->request->getFile('hero_image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/hero', $newName);
            $data['hero_image'] = $newName;
        }

        $this->blogModel->insert($data);

        return redirect()->to('/admin/blogs')->with('message', 'Blog created successfully');
    }

    public function edit($id)
    {
        $data['blog'] = $this->blogModel->find($id);
        return view('admin/blogs/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title'       => 'required|min_length[3]',
            'slug'        => "required|min_length[3]|is_unique[blogs.slug,id,{$id}]",
            'content'     => 'required',
            'status'      => 'required|in_list[draft,review,published]',
            'hero_image'  => 'is_image[hero_image]|max_size[hero_image,2048]',
            'author_name' => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'slug'        => url_title($this->request->getPost('slug'), '-', true),
            'content'     => $this->request->getPost('content'),
            'status'      => $this->request->getPost('status'),
            'author_name' => $this->request->getPost('author_name') ?: null,
        ];

        $file = $this->request->getFile('hero_image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/hero', $newName);
            $data['hero_image'] = $newName;
        }

        $this->blogModel->update($id, $data);

        return redirect()->to('/admin/blogs')->with('message', 'Blog updated successfully');
    }

    public function delete($id)
    {
        $this->blogModel->delete($id);
        return redirect()->to('/admin/blogs')->with('message', 'Blog deleted successfully');
    }
}
