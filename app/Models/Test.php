<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
   use HasFactory;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [ 
      'name' 
   ];

   public function questions()
   {
      return $this->belongsToMany(Question::class);
   }

   public function users()
   {
      return $this->belongsToMany(User::class);
   }

   public function groups()
   {
      return $this->belongsToMany(Group::class);
   }
}
