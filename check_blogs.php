<?php

// Load the CodeIgniter framework
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require 'system/bootstrap.php';

use App\Models\BlogModel;

$model = new BlogModel();
$blogs = $model->findAll();

echo "Total Blogs: " . count($blogs) . "\n";
foreach ($blogs as $blog) {
    echo "ID: {$blog['id']}, Title: {$blog['title']}, Status: {$blog['status']}\n";
}
