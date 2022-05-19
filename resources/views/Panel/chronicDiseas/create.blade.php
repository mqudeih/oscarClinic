@extends('Panel.layouts.index')
@section('content')
    <div class="card">
        <div class="card-header">chronicDiseas Page</div>
        <div class="card-body">

            <form action="{{ route('chronic.store') }}" method="post">
                {!! csrf_field() !!}
                <label>name</label></br>
                <input type="text" name="name" id="name" class="form-control ">
                @foreach ($errors->get('name') as $message)
                    <span class="error">
                        {{ $message }}*
                    </span>
                @endforeach
                </br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
