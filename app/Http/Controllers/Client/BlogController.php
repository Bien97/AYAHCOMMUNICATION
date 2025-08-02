<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index (): View
    {
        return view('client.pages.blog.index');
    }

    public function show (): View
    {
        return view('client.pages.blog.blog-details');
    }
}
