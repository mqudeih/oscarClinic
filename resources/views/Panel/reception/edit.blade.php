@extends('Panel.layouts.index')
@section('content')
    <div class="card">
        <div class="card-header">Update Reception Page</div>
        <div class="card-body">
            <form action="{{ route('recepte.update', $reception->receptionId) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")

                <label>name</label></br>
                <input type="text" name="name" id="name" value="{{ $reception->user->name }}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
