<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;

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
        if (Laratrust::hasRole('Admin')){
            return $this->AdminDashboard();
        }
        if (Laratrust::hasRole('Member')){
            return $this->MemberDashboard();
        }
        return view('home');
    }

    protected function AdminDashboard(){
        return redirect('/admin');
    }
    protected function MemberDashboard(){
        return view('admin.index');
    }
}
