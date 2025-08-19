<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function switchLang($lang)
    {
        if (in_array($lang, ['en', 'fr'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return back();
    }
}
