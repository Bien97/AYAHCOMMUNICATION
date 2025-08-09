<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\SiteContact;
use App\Models\Partner;
use App\Models\Service;      // ajout du modèle Service
use App\Models\Testimonial; // ajout du modèle Testimonial

class HomeController extends Controller
{
    public function index(): View
    {
        $settings = SiteContact::first();
        $partners = Partner::all();        // récupère tous les partenaires
        $services = Service::all();        // récupère tous les services
        $testimonials = Testimonial::all(); // récupère tous les témoignages

        return view('client.pages.index', compact('settings', 'partners', 'services', 'testimonials'));
    }
}
