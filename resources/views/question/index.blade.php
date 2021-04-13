@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Questions</div>

               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <a href="{{ route('questions.create') }}" class="btn btn-primary mb-2">New question</a>
                     <a href="{{ route('admin.home') }}" class="btn btn-primary mb-2">Go to home</a>
                  </div>

                  <table class="table">

                     <thead>
                        <tr class="table-primary">
                           <td>ID</td>
                           <td>Description</td>
                           <td>Actions</td>
                        </tr>
                     </thead>

                     <tbody>
                        @foreach($questions as $question)
                           <tr>
                              <td>{{ $question->id }}</td>
                              <td>{{ $question->description }}</td>
                              <td class="text-left">
                                 <a href="{{ route('questions.show', [$question]) }}" class="btn btn-info btn-sm">Show</a>
                                 <a href="{{ route('questions.edit', [$question]) }}" class="btn btn-success btn-sm">Edit</a>
                                 <form action="{{ route('questions.destroy', [$question] )}}" method="post" style="display: inline-block">
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
