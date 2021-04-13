@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Tests</div>

               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <a href="{{ route('tests.create') }}" class="btn btn-primary mb-2">New test</a>
                     <a href="{{ route('admin.home') }}" class="btn btn-primary mb-2">Go to home</a>
                  </div>

                  <table class="table">

                     <thead>
                        <tr class="table-primary">
                           <td>ID</td>
                           <td>Name</td>
                           <td>Actions</td>
                        </tr>
                     </thead>

                     <tbody>
                        @foreach($tests as $test)
                           <tr>
                              <td>{{ $test->id }}</td>
                              <td>{{ $test->name }}</td>
                              <td class="text-left">
                                 <a href="{{ route('tests.show', [$test]) }}" class="btn btn-info btn-sm">Show</a>
                                 <a href="{{ route('tests.edit', [$test]) }}" class="btn btn-success btn-sm">Edit</a>
                                 <form action="{{ route('tests.destroy', [$test] )}}" method="post" style="display: inline-block">
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
