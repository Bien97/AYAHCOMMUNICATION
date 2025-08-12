<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\SiteContact;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $settings = SiteContact::first();
        return view('admin.dashboard', compact('settings'));
    }
}
