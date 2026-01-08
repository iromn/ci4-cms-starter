<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Users List<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
<span class="text-slate-800 font-semibold">Users List</span>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-2 tracking-tight">Users List</h2>
        <p class="text-slate-500 font-normal">Manage and monitor your application users and their roles.</p>
    </div>
    <a href="<?= base_url('admin/users/create') ?>" class="bg-slate-900 text-white px-6 py-2.5 rounded-xl font-semibold flex items-center space-x-2 hover:bg-slate-800 transition-all shadow-lg shadow-slate-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        <span>Add New User</span>
    </a>
</section>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="bg-emerald-50 border-l-4 border-emerald-400 p-4 mb-6 rounded-r-xl" role="alert">
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

<div class="glass-panel rounded-2xl overflow-hidden shadow-glass border border-white/60">
    <!-- Filter Bar -->
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="relative max-w-sm w-full">
            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input class="w-full bg-white/50 border-slate-200 rounded-xl pl-10 pr-4 py-2 text-sm focus:ring-emerald-500/20 focus:border-emerald-500 outline-none transition-all placeholder-slate-400" placeholder="Search users..." type="text" />
        </div>
        <div class="flex items-center space-x-3">
            <button class="flex items-center space-x-2 px-4 py-2 glass-panel hover:bg-white transition-all rounded-lg text-sm font-medium text-slate-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <span>Filters</span>
            </button>
            <button class="flex items-center space-x-2 px-4 py-2 glass-panel hover:bg-white transition-all rounded-lg text-sm font-medium text-slate-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span>Export</span>
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50">
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">User</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Joined</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/50">
                <?php foreach ($users as $user) : ?>
                    <tr class="hover:bg-white/40 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold border border-indigo-200">
                                    <?= substr($user['username'], 0, 1) ?>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800"><?= esc($user['username']) ?></p>
                                    <p class="text-xs text-slate-400"><?= esc($user['email']) ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <?php if ($user['role_id'] == 1) : ?>
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold border border-indigo-100">Administrator</span>
                            <?php else : ?>
                                <span class="px-3 py-1 bg-slate-50 text-slate-600 rounded-lg text-xs font-bold border border-slate-100">User</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-emerald-400/20 text-emerald-600 border border-emerald-400/30 shadow-neon-green px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider">Active</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-slate-600 font-medium"><?= date('M d, Y', strtotime($user['created_at'])) ?></p>
                            <p class="text-[10px] text-slate-400 font-mono">Verified</p>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="text-slate-400 hover:text-emerald-500 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <a href="<?= base_url('admin/users/delete/' . $user['id']) ?>" onclick="return confirm('Are you sure you want to delete this user?')" class="text-slate-400 hover:text-red-500 transition-colors" title="Delete">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination (Static for now, can be made dynamic later) -->
    <div class="p-6 border-t border-slate-100 flex items-center justify-between">
        <p class="text-sm text-slate-500 font-medium">Showing <span class="text-slate-800"><?= count($users) ?></span> users</p>
        <!-- Pagination controls would go here -->
    </div>
</div>
<?= $this->endSection() ?>