@extends('Panel.layouts.index')
@section('content')
<div class="card">
  <div class="card-header">Update Doctor Page</div>
  <div class="card-body">
       <form action="{{ route('doc.update',$doctor->id) }}" method="post">
        @csrf
        @method("PATCH")
        {{-- <label style="font-weight: bold">IDdisease</label></br>
        <input type="hidden" name="IDdisease" id="IDdisease" value="{{$chronicDiseas->IDdisease}}" id="IDdisease" /> --}}
         <label>name</label></br>
        <input type="text" name="name" id="name" value="{{$doctor->user->name}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
