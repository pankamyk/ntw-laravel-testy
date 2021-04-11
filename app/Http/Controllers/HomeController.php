<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    * Show the application dashboard for normal user.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
      return view('home.home');
   }

   /**
    * Show the application dashboard for admin user.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function admin()
   {
      return view('home.admin');
   }
}
