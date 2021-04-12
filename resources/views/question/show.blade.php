@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Question</div>

               <div class="card-body">
                  <h4 class="card-title my-2">{{ $question->description }}</h4>

                  <hr>

                  <h5 class="card-title my-3">
                     {!! $question->correct_answer == 'answer_1' ? '<b><u>A</u></b>' : 'A' !!} : {{ $question->answer_1 }}
                  </h5>
                  <h5 class="card-title my-3">
                     {!! $question->correct_answer == 'answer_2' ? '<b><u>B</u></b>' : 'B' !!} : {{ $question->answer_2 }}
                  </h5>
                  <h5 class="card-title my-3">
                     {!! $question->correct_answer == 'answer_3' ? '<b><u>C</u></b>' : 'C' !!} : {{ $question->answer_3 }}
                  </h5>
                  <h5 class="card-title my-3">
                     {!! $question->correct_answer == 'answer_4' ? '<b><u>D</u></b>' : 'D' !!} : {{ $question->answer_4 }}
                  </h5>
                  
                  <hr>

                  <a href="{{ route('questions.edit', [$question]) }}" class="btn btn-success btn-sm">Edit</a>
                  <form action="{{ route('questions.destroy', [$question] )}}" method="post" style="display: inline-block">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>                 
                  <a href="{{ route('questions.index') }}" class="btn btn-primary btn-sm">Go back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
