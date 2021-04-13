<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
   use HasFactory;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [ 
      'score',
      'max' 
   ];
   
   public function user()
   {
      return $this->belongsTo(User::class);
   }
   
   public function test()
   {
      return $this->belongsTo(Test::class);
   }
}
