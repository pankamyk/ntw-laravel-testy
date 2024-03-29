@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Users</div>

               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">New user</a>
                     <a href="{{ route('admin.home') }}" class="btn btn-primary mb-2">Go to home</a>
                  </div>

                  <table class="table">

                     <thead>
                        <tr class="table-primary">
                           <td>ID</td>
                           <td>Name</td>
                           <td>Email</td>
                           <td>Status</td>
                           <td>Actions</td>
                        </tr>
                     </thead>

                     <tbody>
                        @foreach($users as $user)
                           <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->is_admin ? "admin" : "" }}</td>
                              <td class="text-left">
                                 <a href="{{ route('users.show', [$user]) }}" class="btn btn-info btn-sm">Show</a>
                                 <a href="{{ route('users.edit', [$user]) }}" class="btn btn-success btn-sm">Edit</a>
                                 @unless($user->is_admin)
                                    <a href="{{ route('users.editTest', [$user]) }}" class="btn btn-success btn-sm">Edit tests</a>
                                    <form action="{{ route('users.destroy', [$user] )}}" method="post" style="display: inline-block">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                 @endunless
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
