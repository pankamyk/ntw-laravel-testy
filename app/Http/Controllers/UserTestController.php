<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class UserTestController extends Controller
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
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $user = auth()->user();

      $tests = $user->tests;

      foreach($user->groups as $group)
      {
         $tests = $tests->merge($group->tests);
      }
      
      return view('usertest.index', [
         'tests' => $tests,
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(Test $test)
   {
      return view('usertest.new', compact('test'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(User $user, Request $request)
   {
      dd($request->all());
      $test = Test::create(['name' => $request->input('name')]);
      $test->questions()->syncWithoutDetaching($request->questions);

      return redirect()->route('tests.show', [$test]);
   }
}
