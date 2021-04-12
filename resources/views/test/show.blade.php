@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Test</div>

               <div class="card-body">
                  <h4 class="card-title my-2">{{ $test->name }}</h4>

                  <hr>

                  <ul class="list-group">
                     @foreach($test->questions as $question)
                        <li class="list-group-item d-flex justify-content-between">
                           <p>{{ $question->description }}</p>
                           <div class="text-right">
                              <a href="{{ route('questions.show', [$question]) }}" class="btn btn-info btn-sm">Edit</a>
                              <a href="{{ route('questions.edit', [$question]) }}" class="btn btn-success btn-sm">Edit</a>
                              <form action="{{ route('questions.destroy', [$question] )}}" method="post" style="display: inline-block">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                              </form>
                           </div>
                        </li>
                     @endforeach
                  </ul>

                  <hr>

                  <a href="{{ route('tests.edit', [$test]) }}" class="btn btn-success btn-sm">Edit</a>
                  <form action="{{ route('tests.destroy', [$test] )}}" method="post" style="display: inline-block">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>                 
                  <a href="{{ route('tests.index') }}" class="btn btn-primary btn-sm">Go back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
