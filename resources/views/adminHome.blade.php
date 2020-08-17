@extends('layouts.app')
@section('content')

<div class="container">
       <div class="row">
       <div class="col-sm-2">
       <div class="card">
       <div class="card-header">Options</div>
        <div class="card-body">
        <div class="row">
        <a href="{{url('users')}}" >   User Management </a> 
        </div>
         </div>
        </div>
       </div>
       <div class="col-sm-10">
       <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome {{ Auth::user()->name }}
                </div>
            </div>
        </div>
       </div>
       </div>
</div>
@endsection