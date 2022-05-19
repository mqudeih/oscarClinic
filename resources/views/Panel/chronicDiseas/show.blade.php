@extends('Panel.layouts.index')
@section('content')
<div class="card">
  <div class="card-header">chronicDiseas Page</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-text">name : {{ $chronicDiseas->name }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
@stop