<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $pageviews  = [];
        $visitors  = [];
        $statistics = \Analytics::fetchTotalVisitorsAndPageViews(Period::days(14));
        foreach ($statistics as $data) {
            $pageviews[] = [$data['date']->getTimestamp()*1000, $data['pageViews']];
            $visitors[] = [$data['date']->getTimestamp()*1000, $data['visitors']];
        }
        return view('admin.dashboard.index', compact('pageviews', 'visitors'));
    }
}
