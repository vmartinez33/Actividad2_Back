<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(url()->previous() == 'http://localhost/login') {
            return redirect()->route('root')->with('info', Lang::get('alerts.logged_successfully'));
        } elseif (url()->previous() == 'http://localhost/register') {
            return redirect()->route('root')->with('info', Lang::get('alerts.registered_successfully'));
        } else {
            return redirect()->route('root')->with('danger', Lang::get('alerts.unknown_error'));
        }

    }
}
