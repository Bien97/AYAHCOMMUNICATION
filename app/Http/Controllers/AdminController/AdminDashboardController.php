<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Settings;
use App\Models\SiteContact;

class AdminDashboardController extends Controller
{
    public function index()
    {

        // Informations de l'utilisateur connecté
        $user = Auth::user();
        $settings = SiteContact::first();
        return view('admin.tableau', compact('settings', 'user'));
    }
}
