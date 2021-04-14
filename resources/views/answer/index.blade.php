@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Answers</div>

               <div class="card-body">
                  <ul class="list-group">
                     @foreach($answers as $answer)
                        <li class="d-flex justify-content-between list-group-item">
                           <div class="d-flex align-items-center">
                              {{ $answer->user->email }} &nbsp;&nbsp;&nbsp; {{ $answer->score }} / {{ $answer->max }}
                           </div>
                           
                           <div class="text-right">
                              <a href="{{ url(route('answers.show', [$answer])) }}" class="btn btn-success">Show</a>
                              <a href="{{ url(route('users.show', [$answer->user])) }}" class="btn btn-info">User</a>
                              <a href="{{ url(route('tests.show', [$answer->test])) }}" class="btn btn-warning">Test</a>
                           </div>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
