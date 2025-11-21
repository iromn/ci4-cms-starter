<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <header class="mb-10 text-center">
        <div class="flex justify-center items-center space-x-2 text-sm text-gray-500 mb-4">
            <time datetime="<?= $blog['created_at'] ?>"><?= date('F j, Y', strtotime($blog['created_at'])) ?></time>
            <span>&middot;</span>
            <span>5 min read</span>
            <?php if ($blog['status'] !== 'published') : ?>
                <span class="ml-2 bg-yellow-100 text-yellow-800 py-0.5 px-2 rounded-full text-xs font-medium uppercase"><?= $blog['status'] ?></span>
            <?php endif; ?>
        </div>
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-6 leading-tight"><?= esc($blog['title']) ?></h1>

        <div class="flex items-center justify-center">
            <div class="flex-shrink-0">
                <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold">
                    <?= strtoupper(substr($blog['author_name'] ?? 'A', 0, 1)) ?>
                </div>
            </div>
            <div class="ml-3 text-left">
                <p class="text-sm font-medium text-gray-900"><?= esc($blog['author_name'] ?? 'Unknown Author') ?></p>
                <p class="text-sm text-gray-500">Writer & Developer</p>
            </div>
        </div>
    </header>

    <!-- Hero Image -->
    <?php if ($blog['hero_image']) : ?>
        <div class="relative rounded-xl overflow-hidden shadow-lg mb-10">
            <img src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" alt="<?= esc($blog['title']) ?>" class="w-full h-auto object-cover">
        </div>
    <?php endif; ?>

    <!-- Content -->
    <div class="prose prose-lg prose-blue mx-auto text-gray-600 blog-content">
        <?= $blog['content'] ?>
    </div>

    <!-- Footer -->
    <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
        <a href="<?= base_url('blog') ?>" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Blog
        </a>

        <div class="flex space-x-4">
            <button class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="sr-only">Share on Twitter</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
            </button>
            <button class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="sr-only">Share on Facebook</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</article>
<?= $this->endSection() ?>