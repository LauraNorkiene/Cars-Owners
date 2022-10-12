<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public  function setLang($lang, Request $request)
    {
        $request->session()->put('lang',$lang);
        return redirect()->back();
    }
}
