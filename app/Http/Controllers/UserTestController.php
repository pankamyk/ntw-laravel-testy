<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

      $answeredTests = [];

      foreach($user->answers as $answer)
      {
         $answeredTests[] = $answer->test;
      }

      $answeredTests = collect($answeredTests);

      $tests = $tests->diff($answeredTests);
      
      return view('usertest.index', [
         'tests' => $tests,
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @param \app\Models\Test $test
    * @return \Illuminate\Http\Response
    */
   public function create(Test $test)
   {
      return view('usertest.new', compact('test'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param \app\Models\Test $test
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Test $test, Request $request)
   {
      $answer = new Answer;

      $answer->test()->associate($test);
      $answer->user()->associate(auth()->user());
      
      $score = 0;
      $max = 0;

      foreach($test->questions as $question) 
      {
         $userAnswer = $request->input((string)$question->id);

         if ($userAnswer == $question->correct_answer) 
         {
            $score++;
         }

         $max++;
      }

      $answer->score = $score;
      $answer->max = $max;

      $answer->save();

      return redirect()->action([UserTestController::class, 'show'], [$test, $request]);
   }

   /**
    * Show a resource.
    *
    * @param \app\Models\Test $test
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function show(Test $test, Request $request)
   {
      return view('usertest.answer', [
         'test' => $test,
         'request' => $request
      ]);
   }
}
