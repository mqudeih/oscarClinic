@extends('DoctorDash.layouts.index')
@section('content')
<div class="card">
  <div class="card-header">Edit Medical Record</div>
  <div class="card-body">
       <form action="{{ route('patient.update',$patient->idPatients) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        {{-- <label style="font-weight: bold">IDdisease</label></br>
        <input type="hidden" name="IDdisease" id="IDdisease" value="{{$chronicDiseas->IDdisease}}" id="IDdisease" /> --}}
         <label>phone</label></br>
        <input type="text" name="phone" id="phone" value="{{$patient->phone}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form> 
  
  </div>
</div>
@stop