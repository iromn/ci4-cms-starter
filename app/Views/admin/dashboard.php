<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
<span class="text-slate-800 font-semibold">Dashboard</span>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="mb-10">
    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-2 tracking-tight">Dashboard Overview</h2>
    <p class="text-slate-500 font-normal">Welcome back, <?= session()->get('username') ?>! Here's what's happening today across your platform.</p>
</section>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Users -->
    <div class="glass-panel p-6 rounded-2xl relative overflow-hidden group hover:shadow-card transition-all duration-300">
        <div class="absolute -right-6 -top-6 w-32 h-32 bg-indigo-500/10 rounded-full blur-2xl group-hover:bg-indigo-500/20 transition-all"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-indigo-600 text-xs font-bold tracking-wider uppercase mb-1">Total Users</p>
                <h3 class="text-4xl font-extrabold text-slate-800"><?= number_format($totalUsers) ?></h3>
                <?php if ($newUsers > 0): ?>
                    <div class="flex items-center mt-2 text-emerald-600 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-full w-max">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span>+<?= $newUsers ?> this week</span>
                    </div>
                <?php else: ?>
                    <div class="flex items-center mt-2 text-slate-400 text-xs font-bold bg-slate-50 px-2 py-1 rounded-full w-max">
                        <span>No change this week</span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white border border-indigo-100 shadow-sm flex items-center justify-center text-indigo-500 backdrop-blur-md">
                <svg class="w-6 h-6 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Blogs -->
    <div class="glass-panel p-6 rounded-2xl relative overflow-hidden group hover:shadow-card transition-all duration-300">
        <div class="absolute -right-6 -top-6 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-emerald-600 text-xs font-bold tracking-wider uppercase mb-1">Total Blogs</p>
                <h3 class="text-4xl font-extrabold text-slate-800"><?= number_format($totalBlogs) ?></h3>
                <?php if ($newBlogs > 0): ?>
                    <div class="flex items-center mt-2 text-emerald-600 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-full w-max">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span>+<?= $newBlogs ?> new posts</span>
                    </div>
                <?php else: ?>
                    <div class="flex items-center mt-2 text-slate-400 text-xs font-bold bg-slate-50 px-2 py-1 rounded-full w-max">
                        <span>No new posts</span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white border border-emerald-100 shadow-sm flex items-center justify-center text-emerald-500 backdrop-blur-md">
                <svg class="w-6 h-6 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Pending Reviews -->
    <div class="glass-panel p-6 rounded-2xl relative overflow-hidden group hover:shadow-card transition-all duration-300">
        <div class="absolute -right-6 -top-6 w-32 h-32 bg-orange-500/10 rounded-full blur-2xl group-hover:bg-orange-500/20 transition-all"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-orange-600 text-xs font-bold tracking-wider uppercase mb-1">Pending Reviews</p>
                <h3 class="text-4xl font-extrabold text-slate-800"><?= $pendingReviews ?></h3>
                <div class="flex items-center mt-2 text-orange-600 text-xs font-bold bg-orange-50 px-2 py-1 rounded-full w-max">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                    <span>Needs attention</span>
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white border border-orange-100 shadow-sm flex items-center justify-center text-orange-500 backdrop-blur-md">
                <svg class="w-6 h-6 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Blog Activity Chart (Dynamic) -->
    <!-- Blog Activity Chart (Dynamic) -->
    <div class="glass-panel p-6 rounded-2xl lg:col-span-2 flex flex-col h-[400px]">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-slate-800">Blog Activity</h3>
            <!-- Range Selector -->
            <form action="<?= base_url('admin/dashboard') ?>" method="get">
                <select name="range" onchange="this.form.submit()"
                    class="bg-white border border-slate-200 text-xs text-slate-600 rounded-lg pl-3 pr-10 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 cursor-pointer appearance-none relative"
                    style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2220%22 height=%2220%22 viewBox=%220 0 20 20%22%3e%3cpath fill=%22%236b7280%22 d=%22M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z%22/%3e%3c/svg%3e'); background-position: right 0.5rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em;">
                    <option value="6months" <?= $selectedRange == '6months' ? 'selected' : '' ?>>Last 6 Months</option>
                    <option value="12months" <?= $selectedRange == '12months' ? 'selected' : '' ?>>Last 12 Months</option>
                    <option value="year" <?= $selectedRange == 'year' ? 'selected' : '' ?>>This Year</option>
                </select>
            </form>
        </div>
        <div class="flex-1 w-full h-full relative">
            <?php if (empty($chartData)): ?>
                <div class="flex items-center justify-center h-full text-slate-400">No blog activity yet</div>
            <?php else: ?>
                <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 <?= $chartSvgWidth ?> 300">
                    <defs>
                        <linearGradient id="gradient" x1="0%" x2="0%" y1="0%" y2="100%">
                            <stop offset="0%" style="stop-color:#34D399;stop-opacity:0.4"></stop>
                            <stop offset="100%" style="stop-color:#34D399;stop-opacity:0"></stop>
                        </linearGradient>
                    </defs>
                    <!-- Grid Labels -->
                    <text fill="#64748b" font-family="Inter" font-size="10" font-weight="500" x="10" y="240">0</text>

                    <!-- Grid Lines (Respect new padding) -->
                    <?php $endX = $chartSvgWidth - $chartPaddingX; ?>
                    <line stroke="rgba(0,0,0,0.05)" stroke-dasharray="4 4" stroke-width="1" x1="<?= $chartPaddingX ?>" x2="<?= $endX ?>" y1="240" y2="240"></line>
                    <line stroke="rgba(0,0,0,0.05)" stroke-dasharray="4 4" stroke-width="1" x1="<?= $chartPaddingX ?>" x2="<?= $endX ?>" y1="180" y2="180"></line>
                    <line stroke="rgba(0,0,0,0.05)" stroke-dasharray="4 4" stroke-width="1" x1="<?= $chartPaddingX ?>" x2="<?= $endX ?>" y1="120" y2="120"></line>

                    <!-- Chart Path -->
                    <!-- Filled area using dynamic variables from controller -->
                    <path class="chart-area" d="<?= $chartPath ?> L <?= $endX ?>,<?= $chartYBase ?> L <?= $chartPaddingX ?>,<?= $chartYBase ?> Z" fill="url(#gradient)" opacity="0.5"></path>
                    <path class="chart-line" d="<?= $chartPath ?>" fill="none" stroke="#10B981" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>

                    <!-- Points and Labels -->
                    <?php foreach ($chartData as $index => $item): ?>
                        <?php
                        if (isset($chartPoints[$index])):
                            $coords = explode(',', $chartPoints[$index]);
                            $cx = $coords[0];
                            $cy = $coords[1];
                        ?>
                            <circle cx="<?= $cx ?>" cy="<?= $cy ?>" fill="#10B981" r="5" stroke="white" stroke-width="2" style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));"></circle>

                            <!-- X Axis Labels (Adjusted Y to 270) -->
                            <text fill="#64748b" font-family="Inter" font-size="10" font-weight="600" text-anchor="middle" x="<?= $cx ?>" y="270"><?= $item['label'] ?></text>

                            <!-- Value Tooltip -->
                            <text fill="#10B981" font-family="Inter" font-size="10" font-weight="bold" text-anchor="middle" x="<?= $cx ?>" y="<?= $cy - 10 ?>"><?= $item['count'] > 0 ? $item['count'] : '' ?></text>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </svg>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Activity (Dynamic) -->
    <div class="glass-panel p-6 rounded-2xl h-[400px] overflow-y-auto custom-scrollbar">
        <h3 class="text-lg font-bold text-slate-800 mb-6 sticky top-0 bg-white/50 backdrop-blur-md z-10 py-2 -mt-2">Recent Activity</h3>
        <div class="space-y-6 relative">
            <?php if (empty($recentActivity)): ?>
                <div class="text-center py-10 text-slate-500 text-sm">
                    No recent activity found.
                </div>
            <?php else: ?>
                <?php foreach ($recentActivity as $index => $activity): ?>
                    <div class="flex gap-4 group">
                        <div class="flex flex-col items-center">
                            <div class="w-2.5 h-2.5 rounded-full bg-<?= $activity['color'] ?>-500 shadow-[0_0_10px_rgba(var(--color-<?= $activity['color'] ?>-500),0.6)] mt-2"></div>
                            <!-- Line connector (hide for last item) -->
                            <div class="w-px h-full bg-slate-200 my-1 <?= $index === count($recentActivity) - 1 ? 'hidden' : '' ?>"></div>
                        </div>
                        <div class="pb-2">
                            <p class="text-sm text-slate-800 font-semibold group-hover:text-<?= $activity['color'] ?>-600 transition-colors"><?= esc($activity['title']) ?></p>
                            <p class="text-xs text-slate-500 mt-1"><?= esc($activity['description']) ?></p>
                            <span class="text-[10px] text-slate-400 font-mono mt-1 block">
                                <?php
                                $timeDiff = time() - $activity['time'];
                                if ($timeDiff < 60) echo 'Just now';
                                elseif ($timeDiff < 3600) echo floor($timeDiff / 60) . ' mins ago';
                                elseif ($timeDiff < 86400) echo floor($timeDiff / 3600) . ' hours ago';
                                else echo floor($timeDiff / 86400) . ' days ago';
                                ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>