<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        if (Session::get('role')->code == "student") {
            return redirect(env('BASE_URL') . 'student/' . Session::get('user')->id . '/detail');
        }

        return view('home.index');
    }

    public  function show404()
    {
        return view('home.show404');
    }
}
