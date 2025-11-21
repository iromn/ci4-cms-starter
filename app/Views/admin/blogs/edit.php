<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Edit Blog<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Blog</h2>
            <p class="text-gray-600 text-sm">Update your blog post.</p>
        </div>
        <a href="<?= base_url('admin/blogs') ?>" class="text-gray-600 hover:text-gray-900 font-medium text-sm">
            &larr; Back to Blogs
        </a>
    </div>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
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

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="<?= base_url('admin/blogs/update/' . $blog['id']) ?>" method="post" enctype="multipart/form-data" class="p-6 space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="title">
                        Blog Title
                    </label>
                    <input class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-200 transition duration-200 shadow-sm"
                        id="title" type="text" name="title" value="<?= old('title', $blog['title']) ?>" required>
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="slug">
                        Slug (URL)
                    </label>
                    <input class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-200 transition duration-200 shadow-sm"
                        id="slug" type="text" name="slug" value="<?= old('slug', $blog['slug']) ?>" required>
                </div>

                <!-- Author Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="author_name">
                        Author Name (Optional)
                    </label>
                    <input class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-200 transition duration-200 shadow-sm"
                        id="author_name" type="text" name="author_name" value="<?= old('author_name', $blog['author_name'] ?? '') ?>" placeholder="Enter author name">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="status">
                        Status
                    </label>
                    <select class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-200 transition duration-200 shadow-sm"
                        id="status" name="status">
                        <option value="draft" <?= $blog['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                        <option value="review" <?= $blog['status'] == 'review' ? 'selected' : '' ?>>Review</option>
                        <option value="published" <?= $blog['status'] == 'published' ? 'selected' : '' ?>>Published</option>
                    </select>
                </div>
            </div>

            <!-- Current Hero Image -->
            <?php if ($blog['hero_image']) : ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Hero Image</label>
                    <img src="<?= base_url('uploads/hero/' . $blog['hero_image']) ?>" alt="Current hero image" class="rounded-lg shadow-sm max-w-md">
                </div>
            <?php endif; ?>

            <!-- Hero Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="hero_image">
                    <?= $blog['hero_image'] ? 'Change Hero Image' : 'Hero Image' ?>
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary-400 transition-colors duration-200">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="hero_image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                <span>Upload a file</span>
                                <input id="hero_image" name="hero_image" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="content">
                    Content
                </label>
                <div class="prose max-w-none">
                    <textarea id="content" name="content"><?= old('content', $blog['content']) ?></textarea>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                <a href="<?= base_url('admin/blogs') ?>" class="text-gray-600 hover:text-gray-900 font-medium mr-6">
                    Cancel
                </a>
                <button class="inline-flex items-center px-6 py-3 bg-primary-600 border border-transparent rounded-lg font-semibold text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-150 shadow-md" type="submit">
                    Update Blog Post
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '<?= base_url('admin/upload/image') ?>'
            },
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection() ?>