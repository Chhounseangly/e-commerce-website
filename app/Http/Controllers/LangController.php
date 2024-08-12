<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{

    public function setLocalLang($lang)
    {
        app()->setLocale($lang);
        session()->put('local', $lang);
        return redirect()->back();
    }
}
