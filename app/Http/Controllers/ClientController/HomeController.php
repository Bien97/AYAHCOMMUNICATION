<?php

namespace App\Http\Controllers\ClientController;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('site.index');
    }
}