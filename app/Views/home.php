<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-24">
    <div
        class="lg:col-span-7 glass-panel rounded-3xl p-8 md:p-12 flex flex-col justify-center relative overflow-hidden group">

        <div class="relative z-10">
            <span
                class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-wider mb-6 border border-primary/20">VERSION
                2.0 RELEASED</span>
            <h1
                class="font-display text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-400">
                Modern content for <span class="text-primary">modern developers</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-300 mb-10 max-w-lg leading-relaxed">
                Discover the latest insights, tutorials, and resources on CodeIgniter 4. Built for performance,
                designed for the future.
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="bg-primary text-white px-8 py-4 rounded-xl font-semibold shadow-lg shadow-primary/30 hover:shadow-primary/50 hover:-translate-y-1 transition-all flex items-center gap-2"
                    href="<?= base_url('blog') ?>">
                    Read the Blog
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
                <a class="glass-card px-8 py-4 rounded-xl font-semibold text-slate-700 dark:text-white hover:bg-white dark:hover:bg-slate-800 transition-all"
                    href="<?= base_url('about') ?>">
                    About Us
                </a>
            </div>
        </div>
    </div>
    <div class="lg:col-span-5 grid grid-rows-2 gap-6 h-full min-h-[500px] lg:min-h-0">
        <div
            class="row-span-2 glass-panel rounded-3xl p-8 relative overflow-hidden flex items-end bg-gradient-to-br from-slate-900 to-slate-800 text-white">
            <img alt="Abstract technology interface with glowing elements"
                class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-overlay"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzLEzoDqCxhfL9wrmt549QQ6YO0QoI-Dh1GIMDM6i-xlJN8HwAT7bT2StjG6bwL9IsPCHLxKwTL1_mc82qDBoKJBt00bH8GLkXxbpeJJl0Y1e4Sy_yvTXsmUs80AISApPa6SILYPfW0zdbroQA8BfWP9RsftJZmyXPFqhEluA9fn6S5ZUtidbIjK7YxLgUAFfkoVtewAecZEbHEzNEz-9p-Dqw3QZltYT600nNdbnYj3_57GJnpx9JBTScQDwmNaaxo_qGnQW3SQ" />
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
            <div class="relative z-10 w-full">
                <div
                    class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 flex items-center justify-center mb-6 shadow-2xl">
                    <span class="font-display font-bold text-2xl text-white">Ci</span>
                </div>
                <h3 class="font-display text-3xl font-bold mb-2">Modern, Flexible CMS</h3>
                <p class="text-slate-300 text-sm mb-4">Powered by CodeIgniter 4</p>
                <div class="space-y-2 text-sm text-slate-400 border-t border-white/10 pt-4">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-base">check_circle</span>
                        User Management &amp; Roles
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-base">check_circle</span>
                        Powerful Blog System
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-base">check_circle</span>
                        Solid Foundation
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-12 text-center">
    <h2 class="font-display text-4xl font-bold mb-4">Latest from the Blog</h2>
    <p class="text-slate-500 dark:text-slate-400 max-w-xl mx-auto">Check out our most recent articles,
        tutorials, and updates from the community.</p>
</div>

<!-- Dynamic Blog Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php if (!empty($featured_blogs)): ?>
        <?php foreach ($featured_blogs as $index => $blog): ?>
            <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl shadow-slate-200/50 dark:shadow-none rounded-2xl overflow-hidden group flex flex-col h-full <?= ($index == 1) ? 'lg:col-span-2' : '' ?>">
                <div class="h-48 overflow-hidden relative bg-purple-100 dark:bg-purple-900/20">
                    <?php if (!empty($blog['hero_image'])): ?>
                        <img src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" alt="<?= esc($blog['title']) ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <?php else: ?>
                        <div class="absolute inset-0 flex items-center justify-center text-purple-300 dark:text-purple-600">
                            <span class="material-symbols-outlined text-6xl">image</span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-tr from-purple-500/10 to-blue-500/10 group-hover:scale-105 transition-transform duration-500"></div>
                    <?php endif; ?>

                    <!-- Featured Tag (Optional, only for the large one maybe?) -->
                    <?php if ($index == 1): ?>
                        <div class="absolute bottom-4 left-4 text-white z-10 hidden sm:block">
                            <span class="px-2 py-1 bg-primary/80 backdrop-blur-sm rounded text-xs font-bold">Featured</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="p-6 md:p-8 flex-1 flex flex-col">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-primary uppercase tracking-wider">Article</span>
                        <span class="text-xs text-slate-400"><?= date('M d, Y', strtotime($blog['created_at'])) ?></span>
                    </div>
                    <h3 class="font-display text-xl <?= ($index == 1) ? 'md:text-2xl' : '' ?> font-bold mb-3 leading-tight group-hover:text-primary transition-colors">
                        <?= esc($blog['title']) ?>
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 flex-1 line-clamp-3">
                        <?= strip_tags($blog['content']) ?>
                    </p>
                    <div class="flex items-center gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700/50">
                        <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center text-xs font-bold">
                            <?= strtoupper(substr($blog['author_name'] ?? 'A', 0, 1)) ?>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-slate-800 dark:text-slate-200"><?= esc($blog['author_name'] ?? 'Admin') ?></span>
                            <span class="text-[10px] text-slate-500">5 min read</span>
                        </div>
                        <?php if ($index == 1): ?>
                            <span class="ml-auto text-primary text-sm font-semibold hover:underline">Read Article</span>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-span-full text-center py-12 text-slate-500">
            <p>No blog posts found yet.</p>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>