<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\SiteContact;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\AboutSection; // Ajout du modèle AboutSection

class HomeController extends Controller
{
    public function index(): View
    {
        $settings = SiteContact::first();
        $partners = Partner::all();
        $services = Service::all();
        $testimonials = Testimonial::all();
        $aboutSection = AboutSection::first(); // Récupération de la section À propos

        return view('client.pages.index', compact('settings', 'partners', 'services', 'testimonials', 'aboutSection'));
    }
}