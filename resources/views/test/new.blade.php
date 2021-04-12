@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">New test</div>

               <div class="card-body">
                  <form method="POST" action="{{ route('tests.store') }}">
                     @csrf

                     <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('name') }}</label>

                        <div class="col-md-8">
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                           @error('name')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <hr>

                     @foreach ($questions as $question)
                        <div class="form-group row">
                           <div class="col-md-2">
                              <input class="form-control" id="{{ $question->id }}" name="questions[]" type="checkbox" 
                              value="{{ $question->id }}">
                           </div>

                           <label for="{{ $question->id }}" class="col-md-8 col-form-label text-md-left">
                              {{ $question->description }}
                           </label>
                        </div>
                     @endforeach

                     <hr>

                     <div class="form-group row mb-0">
                        <div class="col-md-5 offset-md-5">
                           <button type="submit" class="btn btn-primary">
                              {{ __('Add test') }}
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
