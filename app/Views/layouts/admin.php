<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - CI4 CMS</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#34D399",
                        "glass-border": "rgba(255, 255, 255, 0.6)",
                        "glass-surface": "rgba(255, 255, 255, 0.4)",
                    },
                    fontFamily: {
                        display: ["Inter", "sans-serif"],
                        body: ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.75rem",
                        '2xl': "1.25rem",
                    },
                    backdropBlur: {
                        'xs': '2px',
                    },
                    boxShadow: {
                        'neon': '0 0 15px rgba(52, 211, 153, 0.4)',
                        'glass': '0 8px 32px 0 rgba(100, 100, 111, 0.1)',
                        'card': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                    }
                },
            },
        };
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background-color: #f8fafc;
            background-image:
                radial-gradient(at 0% 0%, rgba(167, 139, 250, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(52, 211, 153, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.1) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(20, 184, 166, 0.1) 0px, transparent 50%);
            position: relative;
            overflow-x: hidden;
        }

        .gradient-bg::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -5%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(52, 211, 153, 0.2) 0%, rgba(255, 255, 255, 0) 70%);
            filter: blur(100px);
            z-index: 0;
            pointer-events: none;
        }

        .gradient-bg::after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: -10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.2) 0%, rgba(255, 255, 255, 0) 70%);
            filter: blur(100px);
            z-index: 0;
            pointer-events: none;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
        }

        .chart-line {
            fill: none;
            stroke: #34D399;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            filter: drop-shadow(0 0 6px rgba(52, 211, 153, 0.4));
        }

        .chart-area {
            fill: url(#gradient);
            opacity: 0.2;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.02);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="text-slate-800">
    <div class="gradient-bg min-h-screen relative z-10 flex" x-data="{ sidebarOpen: false }">
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-gray-900 bg-opacity-50 lg:hidden"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;"></div>

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-72 flex flex-col glass-panel m-0 lg:m-4 rounded-none lg:rounded-2xl h-[calc(100vh)] lg:h-[calc(100vh-2rem)] transition-transform duration-300 transform lg:translate-x-0 lg:sticky lg:top-4 shadow-glass"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="p-6 flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-600 rounded-lg flex items-center justify-center shadow-neon">
                    <span class="font-bold text-white text-xl">C</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-800">CI4 CMS</h1>
            </div>
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all group <?= uri_string() == 'admin/dashboard' ? 'bg-white/80 text-emerald-600 border border-white shadow-sm' : 'text-slate-500 hover:bg-white/50 hover:text-slate-800' ?>"
                    href="<?= base_url('admin/dashboard') ?>">
                    <svg class="w-5 h-5 <?= uri_string() == 'admin/dashboard' ? 'text-emerald-500' : 'group-hover:text-emerald-500 transition-colors' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                    <span class="<?= uri_string() == 'admin/dashboard' ? 'font-semibold' : 'font-medium' ?>">Dashboard</span>
                </a>
                <a class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all group <?= strpos(uri_string(), 'admin/users') === 0 ? 'bg-white/80 text-emerald-600 border border-white shadow-sm' : 'text-slate-500 hover:bg-white/50 hover:text-slate-800' ?>"
                    href="<?= base_url('admin/users') ?>">
                    <svg class="w-5 h-5 <?= strpos(uri_string(), 'admin/users') === 0 ? 'text-emerald-500' : 'group-hover:text-emerald-500 transition-colors' ?>" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                    <span class="<?= strpos(uri_string(), 'admin/users') === 0 ? 'font-semibold' : 'font-medium' ?>">Users</span>
                </a>
                <a class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all group <?= strpos(uri_string(), 'admin/blogs') === 0 ? 'bg-white/80 text-emerald-600 border border-white shadow-sm' : 'text-slate-500 hover:bg-white/50 hover:text-slate-800' ?>"
                    href="<?= base_url('admin/blogs') ?>">
                    <svg class="w-5 h-5 <?= strpos(uri_string(), 'admin/blogs') === 0 ? 'text-emerald-500' : 'group-hover:text-emerald-500 transition-colors' ?>" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                    <span class="<?= strpos(uri_string(), 'admin/blogs') === 0 ? 'font-semibold' : 'font-medium' ?>">Blogs</span>
                </a>
            </nav>
            <!-- Logout removed from sidebar -->
        </aside>

        <main class="flex-1 p-4 lg:p-6 overflow-y-auto h-screen relative z-10 custom-scrollbar">
            <!-- Header -->
            <header class="flex flex-col md:flex-row md:items-center justify-between mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center">
                    <!-- Mobile Hamburger -->
                    <button @click="sidebarOpen = true" class="text-slate-500 focus:outline-none lg:hidden mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <div class="flex items-center text-sm text-slate-400 space-x-2">
                        <span class="font-medium">Admin</span>
                        <?= $this->renderSection('breadcrumb') ?>
                    </div>
                </div>

                <!-- Replaced User Profile with Dropdown -->
                <div class="flex items-center space-x-4">
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <div @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false"
                            class="glass-panel pl-2 pr-4 py-1.5 rounded-full flex items-center space-x-3 cursor-pointer hover:bg-white/80 transition-colors shadow-sm select-none">
                            <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-xs font-bold text-white shadow-md">
                                <?= substr(session()->get('username') ?? 'A', 0, 1) ?>
                            </div>
                            <span class="text-sm font-semibold text-slate-700"><?= session()->get('username') ?></span>
                            <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{'rotate-180': userMenuOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                            </svg>
                        </div>

                        <!-- Dropdown Menu -->
                        <div x-show="userMenuOpen"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-glass border border-slate-100 py-1 z-50 origin-top-right"
                            style="display: none;">

                            <a href="<?= base_url('admin/settings') ?>" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">settings</span>
                                Settings
                            </a>
                            <div class="border-t border-slate-100 my-1"></div>
                            <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">logout</span>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script>
        // Glass card hover effect
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.glass-panel');
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    card.style.setProperty('--x', `${x}px`);
                    card.style.setProperty('--y', `${y}px`);
                });
            });
        });
    </script>
</body>

</html>