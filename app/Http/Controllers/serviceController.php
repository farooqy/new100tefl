<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends Controller
{
    //

    public function servicePage()
    {
    	return view('servicepage.service');
    }

    public function careerPage()
    {
    	return view('servicepage.career');
    }
}
