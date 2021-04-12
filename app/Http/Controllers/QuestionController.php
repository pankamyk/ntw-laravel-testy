<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
      $questions = Question::all();

      return view('question.index', compact('questions'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('question.new');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $question = Question::create([
         'description' => $request->input('description'),
         'answer_1' => $request->input('answer_1'),
         'answer_2' => $request->input('answer_2'),
         'answer_3' => $request->input('answer_3'),
         'answer_4' => $request->input('answer_4'),
         'correct_answer' => $request->input('correct_answer')
      ]);

      return redirect()->route('questions.show', [$question]);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function show(Question $question)
   {
      return view('question.show', compact('question'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function edit(Question $question)
   {
      return view('question.edit', compact('question'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Question $question)
   {
      $question->description = $request->input('description');
      $question->answer_1 = $request->input('answer_1');
      $question->answer_2 = $request->input('answer_2');
      $question->answer_3 = $request->input('answer_3');
      $question->answer_4 = $request->input('answer_4');
      $question->correct_answer = $request->input('correct_answer');

      $question->save();

      return redirect()->route('questions.show', [$question]);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function destroy(Question $question)
   {
      $question->tests()->detach();
      $question->delete();

      return redirect()->route('questions.index');
   }
}
