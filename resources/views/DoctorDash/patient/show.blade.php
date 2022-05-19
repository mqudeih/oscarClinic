@extends('DoctorDash.layouts.index')
@section('content')
<div class="card">
  <div class="card-header">Patients Page</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-text">phone : {{ $patients->phone }}</p>
        <p class="card-text">addres : {{ $patients->addres }}</p>


  </div>
      
    </hr>
  
  </div>
</div>
@stop