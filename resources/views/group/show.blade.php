@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Group</div>

               <div class="card-body">
                  <h4 class="card-title my-2">{{ $group->name }}</h4>

                  <hr>

                  <ul class="list-group">
                     @foreach($group->users as $user)
                        <li class="list-group-item d-flex justify-content-between">
                           <p>{{ $user->email }}</p>
                           <div class="text-right">
                              <a href="{{ route('users.show', [$user]) }}" class="btn btn-info btn-sm">Show</a>
                              <a href="{{ route('users.edit', [$user]) }}" class="btn btn-success btn-sm">Edit</a>
                              <form action="{{ route('users.destroy', [$user] )}}" method="post" style="display: inline-block">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                              </form>
                           </div>
                        </li>
                     @endforeach
                  </ul>

                  <hr>

                  <a href="{{ route('groups.edit', [$group]) }}" class="btn btn-success btn-sm">Edit</a>
                  <form action="{{ route('groups.destroy', [$group] )}}" method="post" style="display: inline-block">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>                 
                  <a href="{{ route('groups.index') }}" class="btn btn-primary btn-sm">Go back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
