@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Dashboard</div>
 
            <div class="card-body">
               @if (auth()->user()->is_admin == 1)
                  <ul class="list-group">
                     <li class="list-group-item">
                        <a href="{{ url(route('users.index')) }} ">Users</a>
                     </li>
                     <li class="list-group-item">
                        <a href="{{ url(route('questions.index')) }} ">Questions</a>
                     </li>
                     <li class="list-group-item">
                        <a href="{{ url(route('tests.index')) }} ">Tests</a>
                     </li>
                  </ul>
               @else
                  <div class=”panel-heading”>Normal User</div>
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
