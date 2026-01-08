<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Manage Blogs<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-2 tracking-tight">Blog Posts</h2>
        <p class="text-slate-500 font-normal">Manage, edit, and publish your content with ease.</p>
    </div>
    <a href="<?= base_url('admin/blogs/create') ?>" class="glass-button flex items-center space-x-2 px-6 py-3 rounded-2xl text-emerald-600 font-bold shadow-lg bg-white hover:bg-white/80">
        <span class="material-symbols-outlined">+</span>
        <span>Add New Post</span>
    </a>
</section>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="bg-emerald-50 border-l-4 border-emerald-400 p-4 mb-6 rounded-r-xl shadow-sm" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-emerald-700"><?= session()->getFlashdata('message') ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
    <?php foreach ($blogs as $blog) : ?>
        <?php
        $statusColors = match ($blog['status']) {
            'published' => [
                'bg' => 'bg-emerald-50',
                'border' => 'border-emerald-100',
                'text' => 'text-emerald-600',
                'dot' => 'bg-emerald-500'
            ],
            'draft' => [
                'bg' => 'bg-slate-50',
                'border' => 'border-slate-100',
                'text' => 'text-slate-400',
                'dot' => 'bg-slate-300'
            ],
            'review' => [
                'bg' => 'bg-amber-50',
                'border' => 'border-amber-100',
                'text' => 'text-amber-600',
                'dot' => 'bg-amber-500'
            ],
            default => [
                'bg' => 'bg-gray-50',
                'border' => 'border-gray-100',
                'text' => 'text-gray-600',
                'dot' => 'bg-gray-400'
            ]
        };

        // Initials
        $names = explode(' ', $blog['author_name'] ?? 'Admin');
        $initials = '';
        foreach ($names as $n) {
            $initials .= substr($n, 0, 1);
        }
        $initials = strtoupper(substr($initials, 0, 2));
        ?>
        <div class="glass-panel p-6 rounded-2xl group hover:shadow-card transition-all duration-300 border border-white flex flex-col justify-between h-full relative overflow-hidden">
            <!-- Decorative Background Blur -->
            <div class="absolute -right-12 -top-12 w-32 h-32 <?= str_replace('bg-emerald-500', 'bg-emerald-500/5', $statusColors['dot']) ?> rounded-full blur-2xl group-hover:bg-opacity-20 transition-all">
            </div>

            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <span class="flex items-center space-x-2 text-[10px] font-bold <?= $statusColors['text'] ?> <?= $statusColors['bg'] ?> px-2.5 py-1 rounded-full border <?= $statusColors['border'] ?> uppercase tracking-widest">
                        <span class="w-1.5 h-1.5 rounded-full <?= $statusColors['dot'] ?> <?= $blog['status'] == 'published' ? 'animate-pulse' : '' ?>"></span>
                        <span><?= ucfirst($blog['status']) ?></span>
                    </span>
                    <a href="<?= base_url('admin/blogs/delete/' . $blog['id']) ?>" onclick="return confirm('Are you sure you want to delete this blog?')" class="text-slate-400 hover:text-red-500 transition-colors">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </div>
                <h3 class="text-xl font-bold text-slate-800 leading-tight mb-3 group-hover:text-emerald-700 transition-colors">
                    <?= esc($blog['title']) ?>
                </h3>
                <p class="text-slate-500 text-sm line-clamp-2 mb-6">
                    <?= esc($blog['slug']) ?>
                </p>
            </div>

            <div class="relative z-10 pt-4 border-t border-slate-100/50 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold text-slate-600">
                        <?= $initials ?>
                    </div>
                    <div class="text-xs">
                        <p class="font-bold text-slate-700"><?= esc($blog['author_name'] ?? 'Unknown') ?></p>
                        <p class="text-slate-400 text-[10px]"><?= date('M d, Y', strtotime($blog['created_at'])) ?></p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <?php
                    $previewUrl = ($blog['status'] === 'published')
                        ? base_url('blog/' . $blog['slug'])
                        : base_url('blog/preview/' . $blog['id']);
                    ?>
                    <a href="<?= $previewUrl ?>" target="_blank" class="text-slate-400 hover:text-indigo-600 p-2 rounded-lg hover:bg-indigo-50 transition-colors" title="<?= ($blog['status'] === 'published') ? 'View Live' : 'Preview' ?>">
                        <span class="material-symbols-outlined"><?= ($blog['status'] === 'published') ? 'public' : 'visibility' ?></span>
                    </a>
                    <a href="<?= base_url('admin/blogs/edit/' . $blog['id']) ?>" class="text-emerald-500 hover:text-emerald-600 p-2 rounded-lg hover:bg-emerald-50 transition-colors" title="Edit">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Add New Card (Always Last) -->
    <a href="<?= base_url('admin/blogs/create') ?>" class="glass-panel p-6 rounded-2xl border-2 border-dashed border-slate-200 bg-white/30 flex flex-col items-center justify-center group hover:bg-white/50 hover:border-emerald-300 transition-all cursor-pointer min-h-[250px]">
        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-emerald-100 group-hover:text-emerald-500 transition-all mb-4">
            <span class="material-symbols-outlined text-2xl">post_add</span>
        </div>
        <p class="text-slate-500 font-semibold group-hover:text-emerald-600">Create New Article</p>
    </a>
</div>
<?= $this->endSection() ?>