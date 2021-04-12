<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
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
      $groups = Group::all();

      return view('group.index', compact('groups'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $users = User::where('is_admin', false)->get();
      
      return view('group.new', compact('users'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $group = Group::create(['name' => $request->input('name')]);

      $group->users()->syncWithoutDetaching($request->users);

      return redirect()->route('groups.show', [$group]);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Group  $group
    * @return \Illuminate\Http\Response
    */
   public function show(Group $group)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Group  $group
    * @return \Illuminate\Http\Response
    */
   public function edit(Group $group)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Group  $group
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Group $group)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Group  $group
    * @return \Illuminate\Http\Response
    */
   public function destroy(Group $group)
   {
      //
   }
}
