<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {

        return view('home.index');
    }

    public function about()
    {

        return view('home.about');

    }
    public function classes()
    {

        return view('home.classes');

    }
    public function tutor()
    {

        return view('home.tutors');


    }

    public function contact()
    {

        return view('home.contact-us');


    }

    public function course()
    {

        return view('home.course');


    }
}
