@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Answers</div>

               <div class="card-body">
                  <ul class="list-group-flush">
                     <li class="list-group-item">
                        {{ $answer->user->name }}
                     </li>
                     <li class="list-group-item">
                        {{ $answer->user->email }}
                        <a href="{{ url(route('users.show', [$answer->user])) }}" class="btn btn-info">User</a>
                     </li>
                     <li class="list-group-item">
                        {{ $answer->test->name }}
                        <a href="{{ url(route('tests.show', [$answer->test])) }}" class="btn btn-warning">Test</a>
                     </li>
                     <li class="list-group-item">
                        {{ $answer->score }} / {{ $answer->max }} - {{ round($answer->score/$answer->max, 2) }}%
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
