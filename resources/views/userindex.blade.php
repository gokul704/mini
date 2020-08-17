@extends('layouts.app')
@section('content')

<div class="container">
       <div class="row">
       <div class="col-sm-2">
       <div class="card">
       <div class="card-header">Options</div>
        <div class="card-body">
        <div class="row">
        <a href="{{url('admin/home')}}"> Dashboard </a>   
        </div>
         </div>
        </div>
       </div>
       <div class="col-sm-10">
       <div class="card">
                <div class="card-header">User Management Page</div>
                <div class="container">
                <br>
    <div class="row">
    <div class="col">
        <a href="{{url('users/create')}}"><button class="btn btn-primary" type="submit">Create User</button>  
</a>
    </div>
    </div>
    </div>
                <div class="card-body">
                <table class="table">  
<thead class="thead-dark">  

      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">ROll No</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Operations</th>


    
</thead>  
<tbody>  
@foreach($users as $user)  
        <tr>  
        <th scope="row">{{$user->id}}</th>

            <td>{{$user->name}}</td>  
            <td>{{$user->email}}</td>  
            <td>{{$user->rollno}}</td>  
            <td>{{$user->mobileno}}</td>
    <td>            <form action="{{route('users.destroy', $user->id) }}" method="post">  
                  @csrf  
                  @method('DELETE')  
                  <button class="btn btn-danger" type="submit">Delete</button>  
                </form>  
                
                </td>
<td>
                <form action="{{ route('users.edit', $user->id)}}" method="GET">  
                  @csrf  
                   
                  <button class="btn btn-danger" type="submit">Edit</button>  
                </form>  
</td>
  
         </tr>  
@endforeach  
</tbody>  
</table>  
@endsection  

