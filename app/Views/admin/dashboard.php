<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-800">Dashboard Overview</h2>
    <p class="text-gray-600 mt-1">Welcome back, <?= session()->get('username') ?>! Here's what's happening today.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Users -->
    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-indigo-100 text-sm font-medium uppercase tracking-wide">Total Users</p>
                <p class="text-4xl font-bold mt-2"><?= $totalUsers ?></p>
            </div>
            <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Blogs -->
    <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-emerald-100 text-sm font-medium uppercase tracking-wide">Total Blogs</p>
                <p class="text-4xl font-bold mt-2"><?= $totalBlogs ?></p>
            </div>
            <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Pending Reviews -->
    <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-amber-100 text-sm font-medium uppercase tracking-wide">Pending Reviews</p>
                <p class="text-4xl font-bold mt-2"><?= $pendingReviews ?></p>
            </div>
            <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Chart Section -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Blog Activity</h3>
        <canvas id="blogChart" height="200"></canvas>
    </div>

    <!-- Recent Activity Section -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Activity</h3>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 w-2 h-2 mt-2 rounded-full bg-indigo-500"></div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">New blog post created</p>
                    <p class="text-xs text-gray-500">2 hours ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0 w-2 h-2 mt-2 rounded-full bg-emerald-500"></div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">User "John Doe" registered</p>
                    <p class="text-xs text-gray-500">4 hours ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0 w-2 h-2 mt-2 rounded-full bg-amber-500"></div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Blog post "Hello World" updated</p>
                    <p class="text-xs text-gray-500">1 day ago</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('blogChart').getContext('2d');
    const blogChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Posts',
                data: [12, 19, 3, 5, 2, 3],
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>