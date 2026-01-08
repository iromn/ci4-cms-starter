<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<div class="flex flex-col lg:flex-row gap-8 items-start">
    <!-- Sidebar: Title, Meta, Image -->
    <aside class="w-full lg:w-1/3 sticky top-32">
        <section class="glass-panel rounded-[2.5rem] p-8 md:p-12 flex flex-col h-fit">
            <div class="flex items-center gap-2 mb-6 text-[10px] font-bold tracking-[0.2em] uppercase text-slate-400">
                <time datetime="<?= $blog['created_at'] ?>"><?= date('M d, Y', strtotime($blog['created_at'])) ?></time>
                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                <span>5 Min Read</span>
            </div>

            <h1 class="text-3xl md:text-3xl font-extrabold leading-tight mb-8 tracking-tight text-slate-900 dark:text-white">
                <?= esc($blog['title']) ?>
            </h1>

            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-primary/20">
                    <?= strtoupper(substr($blog['author_name'] ?? 'A', 0, 1)) ?>
                </div>
                <div>
                    <p class="font-bold text-slate-900 dark:text-white"><?= esc($blog['author_name'] ?? 'Unknown Author') ?></p>
                    <p class="text-xs text-slate-500">Lead Developer &amp; Writer</p>
                </div>
            </div>

            <?php if ($blog['hero_image']) : ?>
                <div class="relative group overflow-hidden rounded-2xl shadow-xl transition-all hover:shadow-2xl">
                    <img alt="<?= esc($blog['title']) ?>"
                        class="w-full aspect-[4/3] object-cover transition-transform duration-700 group-hover:scale-105"
                        src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-lg font-bold">Featured Image</p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="mt-10 pt-8 border-t border-slate-200/50 dark:border-slate-700/50 flex items-center justify-between">
                <div class="flex gap-2">
                    <button class="w-10 h-10 rounded-full bg-white/50 dark:bg-slate-800/50 border border-white/50 dark:border-slate-700 flex items-center justify-center hover:bg-white dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined text-slate-400 text-xl">share</span>
                    </button>
                    <button class="w-10 h-10 rounded-full bg-white/50 dark:bg-slate-800/50 border border-white/50 dark:border-slate-700 flex items-center justify-center hover:bg-white dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined text-slate-400 text-xl">bookmark</span>
                    </button>
                    <!-- Edit Button for Admin -->
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <a href="<?= base_url('admin/blogs/edit/' . $blog['id']) ?>" class="w-10 h-10 rounded-full bg-white/50 dark:bg-slate-800/50 border border-white/50 dark:border-slate-700 flex items-center justify-center hover:bg-white dark:hover:bg-slate-800 transition-colors" title="Edit Article">
                            <span class="material-symbols-outlined text-primary text-xl">edit</span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Article Info</div>
            </div>
        </section>
    </aside>

    <!-- Main Content -->
    <article class="w-full lg:w-2/3">
        <section class="glass-panel rounded-[2.5rem] p-8 md:p-16 lg:p-20">
            <!-- Article Body -->
            <div class="prose prose-slate prose-lg max-w-none dark:prose-invert prose-headings:font-extrabold prose-headings:tracking-tight prose-a:text-primary prose-strong:text-slate-900 dark:prose-strong:text-white prose-code:text-primary prose-code:bg-primary/5 prose-code:px-1 prose-code:rounded">
                <?= $blog['content'] ?>
            </div>

            <!-- Bottom Navigation -->
            <div class="mt-20 pt-12 flex flex-col sm:flex-row items-center justify-between border-t border-slate-200/60 dark:border-slate-700/60 gap-8">
                <a href="<?= base_url('blog') ?>" class="flex items-center gap-2 font-bold text-slate-500 hover:text-primary transition-colors group">
                    <span class="material-symbols-outlined transition-transform group-hover:-translate-x-1">arrow_back</span>
                    Back to Articles
                </a>

                <div class="flex items-center gap-6">
                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Next Entry</span>
                    <div class="flex gap-3">
                        <!-- Previous Post -->
                        <?php if (isset($prevBlog) && $prevBlog) : ?>
                            <a href="<?= base_url('blog/' . $prevBlog['slug']) ?>" class="w-14 h-14 rounded-2xl glass-card flex items-center justify-center shadow-sm hover:scale-110 transition-transform bg-white/50 dark:bg-slate-800/50 border-white dark:border-slate-700 hover:bg-white dark:hover:bg-slate-800" title="<?= esc($prevBlog['title']) ?>">
                                <span class="material-symbols-outlined text-slate-400 hover:text-primary">chevron_left</span>
                            </a>
                        <?php else : ?>
                            <button class="w-14 h-14 rounded-2xl glass-card flex items-center justify-center shadow-sm bg-white/50 dark:bg-slate-800/50 border-white dark:border-slate-700 opacity-50 cursor-not-allowed">
                                <span class="material-symbols-outlined text-slate-400">chevron_left</span>
                            </button>
                        <?php endif; ?>

                        <!-- Next Post -->
                        <?php if (isset($nextBlog) && $nextBlog) : ?>
                            <a href="<?= base_url('blog/' . $nextBlog['slug']) ?>" class="w-14 h-14 rounded-2xl glass-card flex items-center justify-center shadow-sm hover:scale-110 transition-transform bg-primary/10 border-primary/20 hover:bg-primary hover:text-white group" title="<?= esc($nextBlog['title']) ?>">
                                <span class="material-symbols-outlined text-primary group-hover:text-white">chevron_right</span>
                            </a>
                        <?php else : ?>
                            <button class="w-14 h-14 rounded-2xl glass-card flex items-center justify-center shadow-sm bg-slate-100 dark:bg-slate-900 border-white/50 opacity-50 cursor-not-allowed">
                                <span class="material-symbols-outlined text-slate-400">chevron_right</span>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>
<?= $this->endSection() ?>