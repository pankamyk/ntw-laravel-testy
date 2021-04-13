@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Edit test classes</div>

               <div class="card-body">
                  <form method="POST" action="{{ route('tests.updateGroup', [$test]) }}">
                     @csrf
                     @method('PATCH')

                     <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('name') }}</label>

                        <div class="col-md-8">
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $test->name }}" required autocomplete="name" autofocus>

                           @error('name')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                        </div>
                     </div>

                     <hr>

                     @foreach ($groups as $group)
                        <div class="form-group row">
                           <div class="col-md-2">
                              <input class="form-control" id="{{ $group->id }}" name="groups[]" type="checkbox" value="{{ $group->id }}" {{ $test->groups->contains($group->id) ? 'checked' : '' }}>
                           </div>

                           <label for="{{ $group->id }}" class="col-md-8 col-form-label text-md-left">
                              {{ $group->name }}
                           </label>
                        </div>
                     @endforeach

                     <hr>

                     <div class="form-group row mb-0">
                        <div class="col-md-5 offset-md-5">
                           <button type="submit" class="btn btn-primary">
                              {{ __('Update classe\'s') }}
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
