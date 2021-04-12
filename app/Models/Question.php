<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   use HasFactory;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'description',
      'answer_1',
      'answer_2',
      'answer_3',
      'answer_4',
      'correct_answer'
   ];
}
