@extends('Panel.layouts.index')
@section('content')
<div class="card">
  <div class="card-header">Doctor Page</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-text">name : {{ $doctor->user ? $doctor->user->name : ''  }}</p>
        <p class="card-text">email : {{ $doctor->user ? $doctor->user->email : ''  }}</p>
        <p class="card-text">password : {{ $doctor->user ? $doctor->user->password : '' }}</p>
        <p class="card-text">User_id : {{ $doctor->User_id }}</p>


  </div>

    </hr>

  </div>
</div>
@stop
