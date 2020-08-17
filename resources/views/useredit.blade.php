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
                <div class="card-header">User Edit Page</div>

                <div class="card-body">
                <form method="Post" action="{{route('users.update',$users->id)}}">  
@method('PATCH')     
 @csrf     
 <div class="form-group">      
              <label for="first_name"> Name:</label><br/><br/>  
              <input type="text" class="form-control"name="name"  value="{{$users->name}}"/><br/><br/>  
          </div>  
<div class="form-group">      
<label for="first_name">Email :</label><br/><br/>  
              <input type="email" class="form-control" name="email" value="{{$users->email}}"/><br/><br/>  
          </div>  
<div class="form-group">      
              <label for="gender">Roll no:</label><br/><br/>  
              <input type="text" class="form-control" name="rollno" value="{{$users->rollno}}"/><br/><br/>  
          </div>  
<div class="form-group">      
              <label for="qualifications">Make As Admin:</label><br/><br/>  
                <input type="text" class="form-control"name="isadmin" value="{{$users->is_admin}}"/><br/><br/>  
          </div>  
<br/>
<div class="form-group">      
              <!-- <label for="qualifications">Password:</label><br/><br/>  
              <input type="password" class="form-control" name="password" value="{{$users->password}}"/><br/><br/>  
          </div>   -->
<br/>  
<div class="form-group">      
              <label for="qualifications">Mobile no:</label><br/><br/>  
              <input type="text" class="form-control" name="mobile" value="{{$users->mobileno}}"/><br/><br/>  
          </div>  
<br/>
<div class="form-group">      
              <label for="qualifications">Points :</label><br/><br/>  
              <input type="text" class="form-control" name="points" value="{{$users->points}}"/><br/><br/>  
          </div>  
<br/>
<button class="btn btn-success" type="submit" class="btn-btn" >Update</button>  
</form>  
  
  
                </div>
            </div>
        </div>
       </div>
       </div>
</div>


@endsection  