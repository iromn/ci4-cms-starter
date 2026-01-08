<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Profile Settings<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
<span class="text-slate-800 font-semibold">Settings</span>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="mb-10">
    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-2 tracking-tight">Profile Settings</h2>
    <p class="text-slate-500 font-normal">Manage your account information, security, and application preferences.</p>
</section>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="bg-emerald-50 border-l-4 border-emerald-400 p-4 mb-6 rounded-r-xl shadow-sm" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="material-symbols-outlined text-emerald-400">check_circle</span>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-emerald-800"><?= session()->getFlashdata('message') ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')) : ?>
    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-xl shadow-sm" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <span class="material-symbols-outlined text-red-400">error</span>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="space-y-6">
        <!-- Profile Card -->
        <div class="glass-panel p-6 rounded-2xl relative overflow-hidden flex flex-col items-center">
            <div class="absolute top-0 w-full h-24 bg-gradient-to-r from-violet-200/40 to-emerald-200/40">
            </div>
            <div class="relative z-10 mt-8 mb-4 group">
                <div class="w-28 h-28 rounded-full bg-white p-1 shadow-glass relative flex items-center justify-center">
                    <div class="w-full h-full rounded-full bg-emerald-500 flex items-center justify-center text-4xl font-bold text-white shadow-inner">
                        <?= substr($user['username'], 0, 1) ?>
                    </div>
                </div>
            </div>
            <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-slate-800"><?= esc($user['username']) ?></h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 mt-1">
                    <?= $user['role_id'] == 1 ? 'Administrator' : 'User' ?>
                </span>
            </div>
            <div class="w-full grid grid-cols-3 gap-2 border-t border-slate-200/50 pt-4 mb-2">
                <div class="text-center">
                    <span class="block font-bold text-slate-800 text-lg">48</span>
                    <span class="text-xs text-slate-500 uppercase tracking-wide">Blogs</span>
                </div>
                <div class="text-center border-l border-r border-slate-200/50">
                    <span class="block font-bold text-slate-800 text-lg">1.2k</span>
                    <span class="text-xs text-slate-500 uppercase tracking-wide">Views</span>
                </div>
                <div class="text-center">
                    <span class="block font-bold text-slate-800 text-lg">12</span>
                    <span class="text-xs text-slate-500 uppercase tracking-wide">Drafts</span>
                </div>
            </div>
        </div>

        <!-- Security Card (Visual Only for now, mapped to same form ideally, but split here for UI match) -->
        <!-- Note: To make this functional, I'll wrap everything in one form or use JS to submit. For now, I will simpler: Two forms or one main form.
             Given the request to "update details", I'll put the password fields in the main form or a separate one. 
             The UI implies separate sections. I'll make the "Account Information" form include password fields for simplicity if user wants, 
             OR keep them separate. The reference has them separate. I'll use a single form for simplicity, or two forms. two forms is better for security UX.
             I'll use a single form for "Account Information" and optionally include password there, 
             OR just duplicate the logic. Let's make it one large form for "Update Profile" including password change.
        -->
    </div>

    <div class="lg:col-span-2 space-y-6">
        <form action="<?= base_url('admin/settings/update') ?>" method="post">
            <?= csrf_field() ?>

            <div class="glass-panel p-6 lg:p-8 rounded-2xl relative overflow-hidden mb-6">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-500/10 rounded-full blur-3xl"></div>
                <div class="flex items-center gap-3 mb-8 relative z-10">
                    <div class="p-2 bg-indigo-50 text-indigo-500 rounded-lg shadow-sm">
                        <span class="material-symbols-outlined text-xl">manage_accounts</span>
                    </div>
                    <h3 class="font-bold text-slate-800 text-lg">Account Information</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Username</label>
                        <div class="relative">
                            <span class="absolute left-4 top-2.5 text-slate-400 material-symbols-outlined text-[20px]">alternate_email</span>
                            <input class="glass-input w-full rounded-xl pl-11 pr-4 py-2.5 text-sm text-slate-700 outline-none transition-all focus:ring-2 focus:ring-emerald-500/20"
                                type="text" name="username" value="<?= old('username', $user['username']) ?>" required />
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email Address</label>
                        <div class="relative">
                            <span class="absolute left-4 top-2.5 text-slate-400 material-symbols-outlined text-[20px]">mail</span>
                            <input class="glass-input w-full rounded-xl pl-11 pr-4 py-2.5 text-sm text-slate-700 outline-none transition-all focus:ring-2 focus:ring-emerald-500/20"
                                type="email" name="email" value="<?= old('email', $user['email']) ?>" required />
                        </div>
                    </div>

                    <!-- Password Section (Included here for atomic update) -->
                    <div class="md:col-span-2 pt-4 border-t border-slate-100">
                        <h4 class="text-sm font-bold text-slate-700 mb-4">Change Password <span class="font-normal text-slate-400">(Leave blank to keep current)</span></h4>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">New Password</label>
                        <input class="glass-input w-full rounded-xl px-4 py-2.5 text-sm text-slate-700 outline-none transition-all focus:ring-2 focus:ring-emerald-500/20"
                            type="password" name="password" placeholder="••••••••" />
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Confirm Password</label>
                        <input class="glass-input w-full rounded-xl px-4 py-2.5 text-sm text-slate-700 outline-none transition-all focus:ring-2 focus:ring-emerald-500/20"
                            type="password" name="pass_confirm" placeholder="••••••••" />
                    </div>

                    <div class="md:col-span-2 flex justify-end mt-4">
                        <button class="py-2.5 px-6 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-sm font-semibold shadow-lg shadow-emerald-500/20 backdrop-blur-sm transition-all flex items-center gap-2"
                            type="submit">
                            <span class="material-symbols-outlined text-sm">save</span>
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Preferences (Visual Only) -->
        <div class="glass-panel p-6 lg:p-8 rounded-2xl relative overflow-hidden opacity-75 grayscale hover:grayscale-0 transition-all duration-500">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-orange-50 text-orange-500 rounded-lg shadow-sm">
                    <span class="material-symbols-outlined text-xl">tune</span>
                </div>
                <h3 class="font-bold text-slate-800 text-lg">Preferences (Coming Soon)</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                <div>
                    <h4 class="text-sm font-bold text-slate-700 mb-4 border-b border-slate-200/50 pb-2">Notifications</h4>
                    <!-- Mock toggles -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-600">Email on new comments</span>
                            <div class="w-9 h-5 bg-emerald-500 rounded-full relative cursor-not-allowed">
                                <div class="absolute right-0.5 top-0.5 bg-white w-4 h-4 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>