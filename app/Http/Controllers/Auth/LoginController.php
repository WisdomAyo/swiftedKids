<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    protected function authenticated(Request $request, $user)
    {
        if(user->role == 'teacher'){
            return redirect()->route(teacher.dashboard);
        }else{
            return redirect()->route(student.dashboard);
        }
        return redirect()->route('home.main');
    }

}
