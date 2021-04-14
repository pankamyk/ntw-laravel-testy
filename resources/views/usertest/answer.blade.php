@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">New test</div>

               <div class="card-body">

                  <h3 class="card-title">{{ $test->name }}</h3>

                  <hr>

                  @foreach ($test->questions->shuffle() as $question)
                     @php 
                        $answers = [
                           ['answer_1', $question->answer_1],
                           ['answer_2', $question->answer_2],
                           ['answer_3', $question->answer_3],
                           ['answer_4', $question->answer_4]
                        ];
                        shuffle($answers);
                        $userAnswer = $request->input((string)$question->id);
                     @endphp
                     <div class="form-group">
                        <ul class="list-group col-md-13">
                           <li class="list-group-item list-group-item-info">
                              {{ $question->description }}
                           </li>

                           @foreach ($answers as $answer)
                              @if($userAnswer == $answer[0] && $answer[0] == $question->correct_answer)
                                 <li class="list-group-item list-group-item-success">
                              @elseif($userAnswer == $answer[0] && $answer[0] != $question->correct_answer)
                                 <li class="list-group-item list-group-item-danger">
                              @else
                                 <li class="list-group-item">
                              @endif
                                 <div class="input-group">
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="{{ $question->id }}" value="{{ $answer[0] }}">
                                       <label class="form-check-label" for="{{ $question->id }}">
                                       {{ $answer[1] }}
                                       </label>
                                    </div>
                                 </div>
                              </li>
                           @endforeach
                        </ul>
                     </div>

                     <hr>

                  @endforeach

                  <div class="form-group row mb-0">
                     <div class="col-md-5 offset-md-5">
                        <a href="{{ route('users.tests') }}" class="btn btn-primary">Go back</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
