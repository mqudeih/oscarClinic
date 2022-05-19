@extends('Panel.layouts.index')
@section('content')
<div class="card">
  <div class="card-header">Update chronicDiseas Page</div>
  <div class="card-body">
       <form action="{{ route('chronic.update',$chronicDiseas->IDdisease) }}" method="post">
        {!! csrf_field() !!}
        {{-- @method("PATCH") --}}
        {{-- <label style="font-weight: bold">IDdisease</label></br>
        <input type="hidden" name="IDdisease" id="IDdisease" value="{{$chronicDiseas->IDdisease}}" id="IDdisease" /> --}}
         <label>name</label></br>
        <input type="text" name="name" id="name" value="{{$chronicDiseas->name}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form> 
  
  </div>
</div>
@stop