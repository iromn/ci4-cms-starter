<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $blogModel = new \App\Models\BlogModel();
        $request = service('request');

        // 1. Stats & Growth
        $totalUsers = $userModel->countAllResults();
        $totalBlogs = $blogModel->countAllResults();
        $pendingReviews = $blogModel->where('status', 'review')->countAllResults();

        // Growth (Last 7 days)
        $weekAgo = date('Y-m-d H:i:s', strtotime('-7 days'));

        $newUsers = $userModel->where('created_at >=', $weekAgo)->countAllResults();
        $newBlogs = $blogModel->where('created_at >=', $weekAgo)->countAllResults();

        $data = [
            'totalUsers' => $totalUsers,
            'newUsers' => $newUsers,
            'totalBlogs' => $totalBlogs,
            'newBlogs' => $newBlogs,
            'pendingReviews' => $pendingReviews,
        ];

        // 2. Recent Activity (Merge Users & Blogs)
        $recentUsers = $userModel->orderBy('created_at', 'DESC')->findAll(5);
        $recentBlogs = $blogModel->orderBy('created_at', 'DESC')->findAll(5);

        $activity = [];

        foreach ($recentUsers as $user) {
            $activity[] = [
                'type' => 'user_register',
                'title' => 'New User Registered',
                'description' => "User \"{$user['username']}\" joined.",
                'time' => strtotime($user['created_at']),
                'color' => 'emerald'
            ];
        }

        foreach ($recentBlogs as $blog) {
            $activity[] = [
                'type' => 'blog_create',
                'title' => 'New Blog Post',
                'description' => "\"{$blog['title']}\"",
                'time' => strtotime($blog['created_at']),
                'color' => 'indigo'
            ];
        }

        // Sort by time DESC
        usort($activity, function ($a, $b) {
            return $b['time'] <=> $a['time'];
        });

        $data['recentActivity'] = array_slice($activity, 0, 5);

        // 3. Blog Chart Data
        $range = $request->getGet('range') ?? '6months';
        $data['selectedRange'] = $range;

        $chartData = [];
        //        $months = 6; 
        //        $dateFormat = 'M'; 

        $monthsToFetch = 6;
        if ($range === '12months') {
            $monthsToFetch = 12;
        }

        // Flexible Date Logic
        if ($range === 'year') {
            // Current Year Jan - Now
            $currentYear = date('Y');
            $currentMonth = (int)date('n');
            for ($i = 1; $i <= $currentMonth; $i++) {
                $dateStr = "$currentYear-$i-01";
                $monthKey = date('Y-m', strtotime($dateStr));
                $count = $blogModel->like('created_at', $monthKey)->countAllResults();
                $chartData[] = [
                    'label' => date('M', strtotime($dateStr)),
                    'count' => $count
                ];
            }
        } else {
            // Last N months logic
            for ($i = $monthsToFetch - 1; $i >= 0; $i--) {
                $month = date('Y-m', strtotime("-$i months"));
                $count = $blogModel->like('created_at', $month)->countAllResults();
                $chartData[] = [
                    'label' => date('M', strtotime("-$i months")),
                    'count' => $count
                ];
            }
        }

        $data['chartData'] = $chartData;

        // Calculate SVG Path for Chart
        // Improved spacing
        $svgWidth = 800;
        $paddingX = 70;
        $usableWidth = $svgWidth - ($paddingX * 2);

        $countItems = count($chartData);
        $stepX = $countItems > 1 ? $usableWidth / ($countItems - 1) : $usableWidth;

        $maxVal = max(array_column($chartData, 'count')) ?: 1;

        // Y-Axis: Top 50, Bottom 230 (LIFTED UP by 20px). Height: 180.
        $yBase = 230;
        $yTop = 50;
        $yHeight = $yBase - $yTop;

        $points = [];

        foreach ($chartData as $index => $item) {
            $x = $paddingX + ($index * $stepX);
            $y = $yBase - (($item['count'] / $maxVal) * $yHeight);
            $points[] = number_format($x, 1, '.', '') . ',' . number_format($y, 1, '.', '');
        }

        if (count($points) > 0) {
            $pathD = "M " . $points[0];
            for ($i = 1; $i < count($points); $i++) {
                $pathD .= " L " . $points[$i];
            }
        } else {
            $pathD = "";
        }

        $data['chartPath'] = $pathD;
        $data['chartPoints'] = $points;
        $data['chartYBase'] = $yBase;
        $data['chartPaddingX'] = $paddingX;
        $data['chartSvgWidth'] = $svgWidth;

        return view('admin/dashboard', $data);
    }
}
