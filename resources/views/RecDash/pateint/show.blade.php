@extends('Panel.layouts.index')
@section('content')
<div class="card">
  <div class="card-header">Pateints Page</div>
  <div class="card-body">
        <div class="card-body">
          <p class="card-text">name : {{ $pateints->user ? $pateints->user->name : ''  }}</p>

        <p class="card-text">phone : {{ $pateints->phone }}</p>
        <p class="card-text">addres : {{ $pateints->addres }}</p>


  </div>
      
    </hr>
  
  </div>
</div>
@stop 
