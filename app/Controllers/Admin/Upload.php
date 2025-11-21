<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Upload extends BaseController
{
    public function uploadImage()
    {
        $file = $this->request->getFile('upload');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/content', $newName);

            return $this->response->setJSON([
                'url' => base_url('uploads/content/' . $newName)
            ]);
        }

        return $this->response->setJSON(['error' => ['message' => 'Upload failed']]);
    }
}
