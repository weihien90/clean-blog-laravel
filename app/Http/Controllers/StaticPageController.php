<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    /**
     * About page.
     */
    public function about()
    {
        return view('static-pages.about');
    }

    /**
     * Contact page.
     */
    public function contact()
    {
        return view('static-pages.contact');
    }
}
