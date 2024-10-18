<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        $teachers = User::where('role', 'teacher')->paginate(10);

        return view('home.tutors', compact('teachers'));


    }

     public function becomeTeacher(){

        return view('home.become-teacher');
     }



    public function contact(){


        return view('home.contact-us');


    }

    public function course()
    {

        return view('home.course');


    }
}
