<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Modern CMS Landing Page</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;family=Space+Grotesk:wght@500;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
        rel="stylesheet" />
    <style>
        .mesh-gradient {
            background-color: #f3f4f6;
            background-image:
                radial-gradient(at 0% 0%, hsla(253, 16%, 7%, 1) 0, transparent 50%),
                radial-gradient(at 50% 0%, hsla(225, 39%, 30%, 1) 0, transparent 50%),
                radial-gradient(at 100% 0%, hsla(339, 49%, 30%, 1) 0, transparent 50%);
        }

        .light-mesh-gradient {
            background-color: #ffffff;
            background-image:
                radial-gradient(at 4% 8%, hsla(152, 60%, 85%, 1) 0px, transparent 50%),
                radial-gradient(at 93% 5%, hsla(260, 60%, 90%, 1) 0px, transparent 50%),
                radial-gradient(at 15% 91%, hsla(260, 60%, 92%, 1) 0px, transparent 50%),
                radial-gradient(at 89% 88%, hsla(152, 60%, 88%, 1) 0px, transparent 50%);
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .dark .glass-panel {
            background: rgba(17, 24, 39, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.75);
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        }

        .dark .glass-card {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .dark .glass-card:hover {
            background: rgba(30, 41, 59, 0.7);
            border-color: rgba(52, 168, 83, 0.3);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#34a853",
                        "primary-dark": "#2d8e46",
                        "background-light": "#f8fafc",
                        "background-dark": "#0f172a",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1e293b",
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        display: ["Space Grotesk", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        'xl': '1rem',
                        '2xl': '1.5rem',
                        '3xl': '2rem',
                    },
                },
            },
        };
    </script>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-100 font-sans min-h-screen relative overflow-x-hidden transition-colors duration-300">

    <nav class="fixed top-0 w-full z-50 transition-all duration-300 pt-6 px-6">
        <div class="glass-panel max-w-7xl mx-auto rounded-full px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div
                    class="bg-primary text-white w-8 h-8 rounded-lg flex items-center justify-center font-bold shadow-lg shadow-primary/30">
                    C</div>
                <span class="font-display font-bold text-lg tracking-tight">CI4 CMS</span>
            </div>
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600 dark:text-slate-300">
                <a class="hover:text-primary transition-colors" href="<?= base_url() ?>">Home</a>
                <a class="hover:text-primary transition-colors" href="<?= base_url('about') ?>">About</a>
                <a class="hover:text-primary transition-colors" href="<?= base_url('blog') ?>">Blog</a>
            </div>
            <div class="flex items-center gap-4">
                <?php if (session()->get('isLoggedIn')): ?>
                    <a class="hidden sm:block text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary"
                        href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                    <a class="bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-5 py-2 rounded-full text-sm font-semibold hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all shadow-lg"
                        href="<?= base_url('logout') ?>">Logout</a>
                <?php else: ?>
                    <a class="bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-5 py-2 rounded-full text-sm font-semibold hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all shadow-lg"
                        href="<?= base_url('login') ?>">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <main class="relative z-10 pt-32 pb-20 px-6 max-w-7xl mx-auto">
        <?= $this->renderSection('content') ?>
    </main>
    <footer
        class="relative z-10 border-t border-slate-200 dark:border-slate-800 bg-white/50 dark:bg-slate-900/50 backdrop-blur-lg mt-12">
        <div class="max-w-7xl mx-auto px-6 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <div
                            class="bg-primary text-white w-8 h-8 rounded-lg flex items-center justify-center font-bold">
                            C</div>
                        <span class="font-display font-bold text-lg tracking-tight">CI4 CMS</span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed max-w-sm mb-6">
                        A modern, flexible Content Management System built with CodeIgniter 4. Designed for performance,
                        scalability, and ease of use for developers and content creators alike.
                    </p>
                    <div class="flex gap-4">
                        <a class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all"
                            href="#">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all"
                            href="#">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path clip-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-display font-bold text-slate-900 dark:text-white mb-6">Navigation</h4>
                    <ul class="space-y-3 text-sm text-slate-500 dark:text-slate-400">
                        <li><a class="hover:text-primary transition-colors" href="#">Home</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">About</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Blog</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Features</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-display font-bold text-slate-900 dark:text-white mb-6">Legal</h4>
                    <ul class="space-y-3 text-sm text-slate-500 dark:text-slate-400">
                        <li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <div
                class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-400">
                <p>© 2026 CI4 CMS. All rights reserved.</p>
                <div class="mt-4 sm:mt-0 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    Systems Operational
                </div>
            </div>
        </div>
    </footer>

</body>

</html>