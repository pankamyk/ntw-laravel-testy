<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
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

   public function users()
   {
      return $this->belongsToMany(User::class);
   }

   public function tests()
   {
      return $this->belongsToMany(Test::class);
   }
}
