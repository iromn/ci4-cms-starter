<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Create New Post<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
<a href="<?= base_url('admin/blogs') ?>" class="hover:text-emerald-500 transition-colors">Blogs</a>
<svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
<span class="text-slate-800 font-semibold">Create New Post</span>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<form action="<?= base_url('admin/blogs/store') ?>" method="post" enctype="multipart/form-data" id="create-post-form">
    <?= csrf_field() ?>
    <!-- Hidden status field, default to draft -->
    <input type="hidden" name="status" id="post-status" value="draft">

    <section class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-2 tracking-tight">Create New Blog Post</h2>
            <p class="text-slate-500 font-normal">Draft your story and share it with the world.</p>
        </div>
        <div class="flex gap-3">
            <button type="button" onclick="submitForm('draft')" class="px-6 py-2.5 glass-panel rounded-xl text-slate-600 font-semibold hover:bg-white transition-all">
                Save Draft
            </button>
            <button type="button" onclick="submitForm('published')" class="px-8 py-2.5 bg-emerald-500 text-white font-bold rounded-xl shadow-neon hover:bg-emerald-600 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-base">send</span>
                Publish
            </button>
        </div>
    </section>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-xl shadow-sm" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
        <!-- Main Content Column -->
        <div class="lg:col-span-2 space-y-6">
            <div class="glass-panel p-8 rounded-2xl">
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider" for="title">Post Title</label>
                    <input class="w-full glass-panel rounded-xl px-4 py-3.5 text-xl font-bold text-slate-800 placeholder:text-slate-300 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500/50 transition-all outline-none"
                        id="title" name="title" value="<?= old('title') ?>" placeholder="Enter post title here..." type="text" required />
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider" for="content">Content</label>
                    <!-- CKEditor Wrapper -->
                    <div class="glass-panel rounded-2xl min-h-[500px] overflow-hidden">
                        <textarea id="content" name="content" class="hidden"><?= old('content') ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="space-y-6">
            <!-- Post Settings -->
            <div class="glass-panel p-6 rounded-2xl">
                <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-500">settings</span>
                    Post Settings
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider" for="slug">Slug (URL)</label>
                        <input class="w-full glass-panel rounded-xl px-4 py-2.5 text-sm text-slate-700 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none"
                            id="slug" name="slug" value="<?= old('slug') ?>" placeholder="my-awesome-post" type="text" required />
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider" for="author_name">Author Name</label>
                        <input class="w-full glass-panel rounded-xl px-4 py-2.5 text-sm text-slate-700 focus:ring-emerald-500/20 focus:border-emerald-500 outline-none"
                            id="author_name" name="author_name" value="<?= old('author_name') ?>" placeholder="John Doe" type="text" />
                    </div>

                    <!-- Visual Placeholders for Category/Tags -->
                    <div class="opacity-75">
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Category (Coming Soon)</label>
                        <select class="w-full glass-panel rounded-xl px-4 py-2.5 text-sm text-slate-700 outline-none" disabled>
                            <option>Select Category</option>
                        </select>
                    </div>
                    <div class="opacity-75">
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Tags (Coming Soon)</label>
                        <div class="glass-panel rounded-xl px-4 py-2.5 text-sm text-slate-400">
                            Add tags...
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="glass-panel p-6 rounded-2xl">
                <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-500">image</span>
                    Featured Image
                </h3>
                <label for="hero_image" class="border-2 border-dashed border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center text-center group hover:border-emerald-300 hover:bg-emerald-50/20 transition-all cursor-pointer block">
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3 group-hover:bg-emerald-100 transition-all">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-emerald-500 transition-all">cloud_upload</span>
                    </div>
                    <p class="text-sm font-semibold text-slate-600">Click to upload or drag &amp; drop</p>
                    <p class="text-[10px] text-slate-400 mt-1">PNG, JPG or WEBP (Max 2MB)</p>
                    <input id="hero_image" name="hero_image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                </label>
                <!-- Image Preview Container -->
                <div id="image-preview" class="mt-4 hidden rounded-xl overflow-hidden shadow-md">
                    <img src="" alt="Preview" class="w-full h-auto object-cover">
                </div>
            </div>

            <!-- Publication Info (Visual) -->
            <div class="glass-panel p-6 rounded-2xl">
                <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-500">schedule</span>
                    Publication
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-slate-600">Visibility</span>
                        <span class="text-sm font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg">Public</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-slate-600">Publish</span>
                        <!-- Dynamic text based on button click could go here, but static for now -->
                        <span class="text-sm font-bold text-slate-700">Immediately</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<style>
    /* Minimalist CKEditor Overrides to match Glassmorphism */
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        border-color: transparent !important;
        box-shadow: none !important;
        background: transparent !important;
    }

    .ck.ck-editor__main>.ck-editor__editable {
        background: transparent !important;
        padding: 1.5rem !important;
        min-height: 400px;
    }

    .ck.ck-toolbar {
        background: rgba(255, 255, 255, 0.5) !important;
        border: none !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.6) !important;
        border-radius: 1rem 1rem 0 0 !important;
    }

    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
        border-radius: 0 0 1rem 1rem !important;
    }

    .ck.ck-editor__top .ck-sticky-panel .ck-toolbar,
    .ck.ck-editor__top .ck-sticky-panel .ck-toolbar.ck-rounded-corners {
        border-radius: 1rem 1rem 0 0 !important;
    }
</style>
<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '<?= base_url('admin/upload/image') ?>'
            },
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo'],
        })
        .catch(error => {
            console.error(error);
        });

    // Handle Form Submission with Status
    function submitForm(status) {
        document.getElementById('post-status').value = status;
        document.getElementById('create-post-form').submit();
    }

    // Slug Auto-generation
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slug = title.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/--+/g, '-')
            .trim();
        document.getElementById('slug').value = slug;
    });

    // Image Preview
    function previewImage(input) {
        const container = document.getElementById('image-preview');
        const img = container.querySelector('img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                img.src = e.target.result;
                container.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            container.classList.add('hidden');
        }
    }
</script>
<?= $this->endSection() ?>