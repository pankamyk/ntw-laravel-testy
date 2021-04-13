@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Edit user tests</div>

               <div class="card-body">

                  <form method="post" action="{{ route('users.updateTest', [$user]) }}">
                     @csrf
                     @method('PATCH')

                     <h5 class="card-title my-2">{{ $user->email }}</h5>

                     <hr>

                     @foreach ($tests as $test)
                        <div class="form-group row">
                           <div class="col-md-2">
                              <input class="form-control" id="{{ $test->id }}" name="tests[]" type="checkbox" value="{{ $test->id }}" {{ $user->tests->contains($test->id) ? 'checked' : '' }}>
                           </div>

                           <label for="{{ $test->id }}" class="col-md-8 col-form-label text-md-left">
                              {{ $test->name }}
                           </label>
                        </div>
                     @endforeach

                     <hr>

                     <div class="form-group row mb-0">
                        <div class="col-md-5 offset-md-5">
                           <button type="submit" class="btn btn-primary">
                              {{ __('Update user tests') }}
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
