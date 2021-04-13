@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">User</div>

               <div class="card-body">
                  <div class="row">
                     <div class="col-md-3">
                        Name
                     </div>
                     <h5 class="col-md-5 card-title">{{ $user->name }}</h5>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        email
                     </div>
                     <h5 class="col-md-5 card-title my-2">{{ $user->email }}</h5>
                  </div>

                  <hr>

                  <ul class="list-group">
                     @foreach($user->groups as $group)
                        <li class="list-group-item d-flex justify-content-between">
                           <p>{{ $group->name }}</p>
                           <div class="text-right">
                              <a href="{{ route('groups.show', [$group]) }}" class="btn btn-info btn-sm">Show</a>
                              <a href="{{ route('groups.edit', [$group]) }}" class="btn btn-success btn-sm">Edit</a>
                              <form action="{{ route('groups.destroy', [$group] )}}" method="post" style="display: inline-block">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                              </form>
                           </div>
                        </li>
                     @endforeach
                  </ul>

                  <hr>

                  <a href="{{ route('users.edit', [$user]) }}" class="btn btn-success btn-sm">Edit</a>
                  @unless($user->is_admin)
                     <a href="{{ route('users.editTest', [$user]) }}" class="btn btn-success btn-sm">Edit tests</a>
                     <form action="{{ route('users.destroy', [$user] )}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                     </form>         
                  @endunless
                  <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Go back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
