@extends('DoctorDash.layouts.index')
@section('content')
    <div class="card">
        <div class="card-header"> Medical Record</div>
        
        <div class="card-body">

            <form action="{{ route('patient.store') }}" method="post">
                {!! csrf_field() !!}

                <label>Allergy To Medication</label>
                <textarea placeholder="Type" class="form-control "></textarea></br>
                <label>Past Surgery</label>
                <textarea placeholder="Type" class="form-control "></textarea></br>
                <label>Blood Group</label>
                <textarea placeholder="Type" class="form-control "></textarea></br>
                <label>Notes</label>
                <textarea placeholder="Type" class="form-control "></textarea></br>


                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
