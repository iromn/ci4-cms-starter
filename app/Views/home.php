<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-indigo-50 via-white to-purple-50 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Modern content for</span>
                        <span class="block text-primary-600 xl:inline">modern developers</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Discover the latest insights, tutorials, and resources on CodeIgniter 4, web development, and modern UI/UX design.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="<?= base_url('blog') ?>" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 md:py-4 md:text-lg md:px-10">
                                Read the Blog
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="<?= base_url('about') ?>" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary-700 bg-primary-100 hover:bg-primary-200 md:py-4 md:text-lg md:px-10">
                                About Us
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-gradient-to-br from-purple-50 to-indigo-50 flex items-center justify-center">
        <img
            src="/images/ci4-cms-starter-hero.webp"
            alt="CI4 CMS Starter Hero Image"
            class="w-full h-64 sm:h-80 md:h-96 lg:h-full object-cover object-center"
            loading="lazy">
    </div>
</section>

<!-- Featured Posts -->
<section class="py-12 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Latest from the Blog</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Check out our most recent articles and updates.
            </p>
        </div>
        <div class="mt-12 grid gap-8 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
            <?php if (!empty($featured_blogs)) : ?>
                <?php foreach ($featured_blogs as $blog) : ?>
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-1 hover:shadow-xl bg-white">
                        <div class="flex-shrink-0">
                            <?php if ($blog['hero_image']) : ?>
                                <img class="h-48 w-full object-cover" src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" alt="<?= esc($blog['title']) ?>">
                            <?php else : ?>
                                <div class="h-48 w-full bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center text-indigo-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-primary-600">
                                    Article
                                </p>
                                <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        <?= esc($blog['title']) ?>
                                    </p>
                                    <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                        <?= strip_tags($blog['content']) ?>
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="sr-only">Author</span>
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-indigo-400 to-purple-400 flex items-center justify-center text-white font-bold">
                                        <?= strtoupper(substr($blog['author_name'] ?? 'A', 0, 1)) ?>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <?= esc($blog['author_name'] ?? 'Unknown Author') ?>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="<?= $blog['created_at'] ?>">
                                            <?= date('M d, Y', strtotime($blog['created_at'])) ?>
                                        </time>
                                        <span aria-hidden="true">&middot;</span>
                                        <span>5 min read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-span-3 text-center text-gray-500 py-12">
                    No blog posts found.
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>