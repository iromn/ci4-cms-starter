<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900">About Us</h2>
                <p class="mt-4 text-lg text-gray-500">Building the future of content management with CodeIgniter 4.</p>
            </div>
            <div class="mt-12 lg:mt-0 lg:col-span-2">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <h3 class="text-2xl font-bold leading-6 font-medium text-gray-900">Our Mission</h3>
                        <p class="text-lg text-gray-500">
                            Welcome to CI4 CMS Starter. This project is designed to be a robust skeleton for building content-driven websites using CodeIgniter 4. Our goal is to provide a simple yet powerful foundation that includes essential features like user management, role-based access control, and a flexible blog system.
                        </p>
                    </div>
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <h3 class="text-2xl font-bold leading-6 font-medium text-gray-900">Why Choose Us?</h3>
                        <p class="text-lg text-gray-500">
                            Whether you're a developer looking for a quick start or a business needing a custom CMS, CI4 CMS Starter has you covered. We prioritize performance, security, and ease of use, ensuring that your content management experience is seamless and efficient.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>