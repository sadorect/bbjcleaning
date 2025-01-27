<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, config('languages'))) {
            Session::put('applocale', $lang);
            App::setLocale($lang);
        }
        return redirect()->back();
    }
}
