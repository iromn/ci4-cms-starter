<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<!-- Header Section -->
<div class="text-center mb-16 space-y-4 relative">

    <span class="inline-block px-3 py-1 bg-primary/10 text-primary-dark text-xs font-semibold rounded-full tracking-wide uppercase mb-2 border border-primary/20">
        Technical Insights
    </span>
    <h1 class="font-display text-5xl md:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white">
        Latest Blog Posts
    </h1>
    <p class="text-lg text-slate-500 dark:text-slate-400 max-w-2xl mx-auto font-light leading-relaxed">
        Expert perspectives on development, design, and the future of CI4 CMS. Curated for the modern web professional.
    </p>
</div>

<!-- Blog Grid -->
<?php if (empty($blogs)) : ?>
    <div class="glass-panel p-12 text-center rounded-3xl">
        <span class="material-symbols-outlined text-4xl text-slate-400 mb-4">library_books</span>
        <h3 class="font-display text-xl font-bold text-slate-900 dark:text-white mb-2">No posts found</h3>
        <p class="text-slate-500">Check back later for new content.</p>
    </div>
<?php else : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 auto-rows-[minmax(320px,auto)]">
        <?php foreach ($blogs as $index => $blog) : ?>
            <?php if ($index === 0) : ?>
                <!-- Featured Post (First Item) -->
                <article class="col-span-1 md:col-span-2 lg:col-span-2 row-span-2 glass-panel rounded-3xl p-5 flex flex-col group relative overflow-hidden transition-all hover:shadow-2xl hover:shadow-primary/10 border border-white/40 dark:border-white/10">
                    <div class="absolute top-0 right-0 p-5 z-20">
                        <span class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-slate-800 dark:text-white shadow-sm border border-white/50 dark:border-slate-700">FEATURED</span>
                    </div>
                    <div class="relative h-64 md:h-80 w-full rounded-2xl overflow-hidden mb-5">
                        <?php if ($blog['hero_image']) : ?>
                            <img alt="<?= esc($blog['title']) ?>"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" />
                        <?php else : ?>
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-900 flex items-center justify-center">
                                <span class="material-symbols-outlined text-6xl text-slate-300">image</span>
                            </div>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/30 to-transparent"></div>
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_10px_rgba(52,168,83,0.5)]"></span>
                                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Article</span>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-3 leading-tight group-hover:text-primary transition-colors">
                                <a href="<?= base_url('blog/' . $blog['slug']) ?>">
                                    <?= esc($blog['title']) ?>
                                </a>
                            </h2>
                            <p class="text-slate-500 dark:text-slate-400 leading-relaxed line-clamp-3 mb-4">
                                <?= substr(strip_tags($blog['content']), 0, 200) ?>...
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-200/50 dark:border-slate-700/50">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary text-xs font-bold">
                                    <?= strtoupper(substr($blog['author_name'] ?? 'A', 0, 1)) ?>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-semibold text-slate-800 dark:text-slate-200"><?= esc($blog['author_name'] ?? 'Unknown Author') ?></span>
                                    <span class="text-xs text-slate-400"><?= date('M d, Y', strtotime($blog['created_at'])) ?></span>
                                </div>
                            </div>
                            <span class="text-xs text-slate-400 font-medium bg-slate-50 dark:bg-slate-800 px-2 py-1 rounded-md">5 min read</span>
                        </div>
                    </div>
                </article>
            <?php else : ?>
                <!-- Standard Post -->
                <article class="glass-card rounded-3xl p-4 flex flex-col group border border-white/40 dark:border-white/5">
                    <div class="relative h-48 w-full rounded-xl overflow-hidden mb-4 bg-slate-100 dark:bg-slate-800">
                        <?php if ($blog['hero_image']) : ?>
                            <img alt="<?= esc($blog['title']) ?>"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" />
                        <?php else : ?>
                            <div class="absolute inset-0 flex items-center justify-center text-slate-300">
                                <span class="material-symbols-outlined text-4xl">article</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-[10px] font-bold text-primary bg-primary/5 border border-primary/10 px-2 py-0.5 rounded-full uppercase">Post</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-2 leading-snug group-hover:text-primary transition-colors">
                            <a href="<?= base_url('blog/' . $blog['slug']) ?>">
                                <?= esc($blog['title']) ?>
                            </a>
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mb-4 flex-grow">
                            <?= substr(strip_tags($blog['content']), 0, 100) ?>...
                        </p>
                        <div class="flex items-center space-x-2 mt-auto pt-3 border-t border-slate-100 dark:border-slate-700/50">
                            <div class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-[10px] text-slate-600 dark:text-slate-300 font-bold">
                                <?= strtoupper(substr($blog['author_name'] ?? 'A', 0, 1)) ?>
                            </div>
                            <span class="text-xs text-slate-500"><?= esc($blog['author_name'] ?? 'Author') ?> • <?= date('M d', strtotime($blog['created_at'])) ?></span>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

            <!-- Inject Static "Stay Updated" Card after 2nd post (index 1) for variety -->
            <?php if ($index === 1) : ?>
                <div class="glass-module rounded-3xl p-6 flex flex-col items-center justify-center text-center group cursor-pointer bg-gradient-to-br from-primary/90 to-primary-dark/90 text-white transition-all duration-300 shadow-lg shadow-primary/20">
                    <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center mb-4 group-hover:bg-white group-hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <h4 class="font-bold mb-1">Stay Updated</h4>
                    <p class="text-xs text-white/80 mb-4">Get the latest dev tips weekly.</p>
                    <button class="text-xs font-bold uppercase tracking-wide text-primary bg-white px-4 py-2 rounded-full shadow-sm opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-300">Subscribe</button>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>

    <div class="mt-20 flex justify-center">
        <button class="group flex items-center space-x-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary/50 hover:shadow-lg hover:shadow-primary/10 px-8 py-3 rounded-full transition-all duration-300">
            <span class="font-semibold text-slate-600 dark:text-slate-300 group-hover:text-primary">View All Insights</span>
            <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors text-sm">grid_view</span>
        </button>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>