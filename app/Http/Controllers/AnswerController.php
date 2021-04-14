<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use App\Models\Test;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $answers = Answer::with(['test', 'user'])->get();

      return view('answer.index', compact('answers'));
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Answer  $answer
    * @return \Illuminate\Http\Response
    */
   public function show(Answer $answer)
   {
      $answer->load('test', 'user');

      return view('answer.show', compact('answer'));
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Answer  $answer
    * @return \Illuminate\Http\Response
    */
   public function destroy(Answer $answer)
   {
      //
   }
}
