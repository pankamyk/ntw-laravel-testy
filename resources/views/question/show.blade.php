@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Question</div>

               <div class="card-body">
                  <h5 class="card-title my-2">{{ $question->description }}</h5>

                  <hr>

                  <table class="table table-bordered">
                     <tbody>
                        <tr {!! $question->correct_answer == 'answer_1' ? 'class="table-success"' : '' !!}>
                           <th scope="row">A</th>
                           <td>
                              {{ $question->answer_1 }}
                           </td>
                        </tr>
                        <tr {!! $question->correct_answer == 'answer_2' ? 'class="table-success"' : '' !!}>
                           <th scope="row">B</th>
                           <td>
                              {{ $question->answer_2 }}
                           </td>
                        </tr>
                        <tr {!! $question->correct_answer == 'answer_3' ? 'class="table-success"' : '' !!}>
                           <th scope="row">C</th>
                           <td>
                              {{ $question->answer_3 }}
                           </td>
                        </tr>
                        <tr {!! $question->correct_answer == 'answer_4' ? 'class="table-success"' : '' !!}>
                           <th scope="row">D</th>
                           <td>
                              {{ $question->answer_4 }}
                           </td>
                        </tr>
                     </tbody>
                  </table>

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
