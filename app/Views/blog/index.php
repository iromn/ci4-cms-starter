<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Latest Blog Posts</h1>
        <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
            Insights, tutorials, and updates from the team.
        </p>
    </div>

    <?php if (empty($blogs)) : ?>
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No posts found</h3>
            <p class="mt-1 text-sm text-gray-500">Check back later for new content.</p>
        </div>
    <?php else : ?>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($blogs as $blog) : ?>
                <article class="flex flex-col rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-1 hover:shadow-xl bg-white">
                    <div class="flex-shrink-0">
                        <?php if ($blog['hero_image']) : ?>
                            <img class="h-48 w-full object-cover" src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" alt="<?= esc($blog['title']) ?>">
                        <?php else : ?>
                            <div class="h-48 w-full bg-gray-200 flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900 hover:text-primary-600 transition-colors">
                                    <?= esc($blog['title']) ?>
                                </p>
                                <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                    <?= substr(strip_tags($blog['content']), 0, 150) ?>...
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <span class="sr-only">Author</span>
                                <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>