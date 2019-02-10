<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class privacyController extends Controller
{
    //

    public function privacy()
    {
    	return view('privacy.privacy');
    }
    public function cookies()
    {
    	return view('privacy.cookies');
    }
    public function terms()
    {
    	return view('privacy.terms');
    }
}
