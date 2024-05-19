<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public $menu_url = "dashboard";

    public function index()
    {
        if (Session::get('role')->code == "student") {
            return redirect(env('BASE_URL') . 'student/' . Session::get('user')->id . '/detail');
        }

        return view('dashboard.index')->with([
            'menu' => $this->menu_url
        ]);
    }
}
