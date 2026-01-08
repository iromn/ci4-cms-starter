<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<div class="glass-panel p-8 md:p-12 rounded-3xl">
    <div class="max-w-3xl mx-auto text-center mb-12">
        <h1 class="font-display text-4xl font-bold mb-4">About Us</h1>
        <p class="text-lg text-slate-500">Building the future of content management with CodeIgniter 4.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-12">
        <div class="space-y-6">
            <h3 class="font-display text-2xl font-bold">Our Mission</h3>
            <p class="text-slate-600 leading-relaxed">
                Welcome to CI4 CMS Starter. This project is designed to be a robust skeleton for building content-driven websites using CodeIgniter 4. Our goal is to provide a simple yet powerful foundation that includes essential features like user management, role-based access control, and a flexible blog system.
            </p>
        </div>
        <div class="space-y-6">
            <h3 class="font-display text-2xl font-bold">Why Choose Us?</h3>
            <p class="text-slate-600 leading-relaxed">
                Whether you're a developer looking for a quick start or a business needing a custom CMS, CI4 CMS Starter has you covered. We prioritize performance, security, and ease of use, ensuring that your content management experience is seamless and efficient.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>