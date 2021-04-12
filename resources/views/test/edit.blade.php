@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">New question</div>

               <div class="card-body">

                  <form method="post" action="{{ route('questions.update', [$question]) }}">
                     @csrf
                     @method('PATCH')

                     <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                           <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $question->description }}" required autocomplete="description" autofocus>

                           @error('description')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="answer_1" class="col-md-4 col-form-label text-md-right">{{ __('A') }}</label>

                        <div class="col-md-6">
                           <input id="answer_1" type="text" class="form-control @error('answer_1') is-invalid @enderror" name="answer_1" value="{{ $question->answer_1 }}" required autocomplete="answer_1" autofocus>

                           @error('answer_1')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="answer_2" class="col-md-4 col-form-label text-md-right">{{ __('B') }}</label>

                        <div class="col-md-6">
                           <input id="answer_2" type="text" class="form-control @error('answer_2') is-invalid @enderror" name="answer_2" value="{{ $question->answer_2 }}" required autocomplete="answer_2" autofocus>

                           @error('answer_2')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="answer_3" class="col-md-4 col-form-label text-md-right">{{ __('C') }}</label>

                        <div class="col-md-6">
                           <input id="answer_3" type="text" class="form-control @error('answer_3') is-invalid @enderror" name="answer_3" value="{{ $question->answer_3 }}" required autocomplete="answer_3" autofocus>

                           @error('answer_3')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="answer_4" class="col-md-4 col-form-label text-md-right">{{ __('D') }}</label>

                        <div class="col-md-6">
                           <input id="answer_4" type="text" class="form-control @error('answer_4') is-invalid @enderror" name="answer_4" value="{{ $question->answer_4 }}" required autocomplete="answer_4" autofocus>

                           @error('answer_4')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="correct_answer" class="col-md-4 col-form-label text-md-right">{{ __('Corrent answer') }}</label>

                        <div class="col-md-6">
                           <select id="correct_answer" name="correct_answer" class="form-control @error('correct_answer') is-invalid @enderror" required autofocus>
                              <option value="answer_1" {{ $question->correct_answer == 'answer_1' ? 'selected' : '' }}>A</option>
                              <option value="answer_2" {{ $question->correct_answer == 'answer_2' ? 'selected' : '' }}>B</option>
                              <option value="answer_3" {{ $question->correct_answer == 'answer_3' ? 'selected' : '' }}>C</option>
                              <option value="answer_4" {{ $question->correct_answer == 'answer_4' ? 'selected' : '' }}>D</option>
                           </select>

                           @error('answer_4')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                           <button type="submit" class="btn btn-primary">
                              {{ __('Update') }}
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
