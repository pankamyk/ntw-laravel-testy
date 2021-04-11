@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Users</div>

               <div class="card-body">
                  <div class="center">
                     <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">New user</a>
                  </div>
                  <table class="table">

                     <thead>
                        <tr class="table-primary">
                           <td>ID</td>
                           <td>Name</td>
                           <td>Email</td>
                           <td>Admin?</td>
                           <td>Actions</td>
                        </tr>
                     </thead>

                     <tbody>
                        @foreach($users as $user)
                           <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->is_admin }}</td>
                              <td class="text-center">
                                 <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                                 <form action="{{ route('users.destroy', $user->id )}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                 </form>
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
