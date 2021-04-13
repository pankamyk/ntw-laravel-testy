<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
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
      $tests = Test::all();

      return view('test.index', compact('tests'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $questions = Question::all();
      
      return view('test.new', compact('questions'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $test = Test::create(['name' => $request->input('name')]);
      $test->questions()->syncWithoutDetaching($request->questions);

      return redirect()->route('tests.show', [$test]);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Test  $test
    * @return \Illuminate\Http\Response
    */
   public function show(Test $test)
   {
      return view('test.show', compact('test'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Test  $test
    * @return \Illuminate\Http\Response
    */
   public function edit(Test $test)
   {
      $test->load('questions');
      $questions = Question::all(); //with('tests')->get();

      return view('test.edit', [
         'test' => $test, 
         'questions' => $questions
      ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Test  $test
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Test $test)
   {
      $test->name = $request->input('name');
      $test->questions()->sync($request->questions);

      return redirect()->route('tests.show', [$test]);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Test  $test
    * @return \Illuminate\Http\Response
    */
   public function destroy(Test $test)
   {
      $test->questions()->detach();
      $test->delete();

      return redirect()->route('tests.index');
   }
}
