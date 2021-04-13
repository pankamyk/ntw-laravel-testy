@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Your tests</div>

               <div class="card-body">


                  <ul class="list-group">
                     @foreach($tests as $test)
                        <li class="list-group-item">
                           {{ $test->name }}
                           <a href="{{ route('users.tests.new', [$test]) }}" class="btn btn-info btn-sm">Solve</a>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
