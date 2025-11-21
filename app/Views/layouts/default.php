<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI4 CMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Global Heading Styles - Override Tailwind */
        h1 {
            font-size: 2.5rem !important;
            font-weight: 700 !important;
            line-height: 1.2 !important;
            margin-bottom: 1rem !important;
            color: #1f2937 !important;
        }

        h2 {
            font-size: 2rem !important;
            font-weight: 700 !important;
            line-height: 1.3 !important;
            margin-bottom: 0.875rem !important;
            color: #1f2937 !important;
        }

        h3 {
            font-size: 1.75rem !important;
            font-weight: 600 !important;
            line-height: 1.4 !important;
            margin-bottom: 0.75rem !important;
            color: #374151 !important;
        }

        h4 {
            font-size: 1.5rem !important;
            font-weight: 600 !important;
            line-height: 1.4 !important;
            margin-bottom: 0.75rem !important;
            color: #374151 !important;
        }

        h5 {
            font-size: 1.25rem !important;
            font-weight: 600 !important;
            line-height: 1.5 !important;
            margin-bottom: 0.625rem !important;
            color: #4b5563 !important;
        }

        h6 {
            font-size: 1.125rem !important;
            font-weight: 600 !important;
            line-height: 1.5 !important;
            margin-bottom: 0.625rem !important;
            color: #4b5563 !important;
        }

        /* Blog Content Styles */
        .blog-content p {
            margin-bottom: 1rem;
            line-height: 1.75;
            color: #374151;
        }

        .blog-content ul,
        .blog-content ol {
            margin-bottom: 1rem;
            padding-left: 1.5rem;
        }

        .blog-content li {
            margin-bottom: 0.5rem;
            line-height: 1.75;
        }

        .blog-content blockquote {
            border-left: 4px solid #6366f1;
            padding-left: 1rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #6b7280;
        }

        .blog-content a {
            color: #6366f1;
            text-decoration: underline;
        }

        .blog-content a:hover {
            color: #4f46e5;
        }

        .blog-content strong {
            font-weight: 700;
        }

        .blog-content em {
            font-style: italic;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans text-gray-800 flex flex-col min-h-screen">
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="<?= base_url('/') ?>" class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">C</div>
                <span class="text-xl font-bold text-gray-900 tracking-tight">CI4 CMS</span>
            </a>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="<?= base_url('/') ?>" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">Home</a>
                <a href="<?= base_url('about') ?>" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">About</a>
                <a href="<?= base_url('blog') ?>" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">Blog</a>
            </nav>

            <div class="flex items-center space-x-4">
                <?php if (session()->get('isLoggedIn')) : ?>
                    <a href="<?= base_url('admin/dashboard') ?>" class="text-sm font-medium text-primary-600 hover:text-primary-700">Dashboard</a>
                    <a href="<?= base_url('logout') ?>" class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition-colors">Logout</a>
                <?php else : ?>
                    <a href="<?= base_url('login') ?>" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-colors shadow-sm hover:shadow-md">Sign In</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <a href="<?= base_url('/') ?>" class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">C</div>
                        <span class="text-xl font-bold text-gray-900 tracking-tight">CI4 CMS</span>
                    </a>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                        A modern, flexible Content Management System built with CodeIgniter 4. Designed for performance and ease of use.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-gray-900 mb-4">Navigation</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="<?= base_url('/') ?>" class="hover:text-primary-600 transition-colors">Home</a></li>
                        <li><a href="<?= base_url('about') ?>" class="hover:text-primary-600 transition-colors">About</a></li>
                        <li><a href="<?= base_url('blog') ?>" class="hover:text-primary-600 transition-colors">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-gray-900 mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-primary-600 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-primary-600 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-400">&copy; <?= date('Y') ?> CI4 CMS. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-gray-600">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-600">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>