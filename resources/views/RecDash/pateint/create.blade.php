@extends('Panel.layouts.index')
@section('content')
    <div class="card">
        <div class="card-header">Pateints Page</div>
        <div class="card-body">

            <form action="{{ route('pateint.store') }}" method="post">
                {!! csrf_field() !!}

                <label>name</label></br>
                <input type="text" name="name" id="name" class="form-control ">
                <label>email</label></br>
                <input type="email" name="email" id="email" class="form-control ">
                <label>password</label></br>
                <input type="password" name="password" id="password" class="form-control ">
                <label>DataOfBirth</label></br>
                <input type="DataOfBirth" name="DataOfBirth" id="DataOfBirth" class="form-control ">
                <label>address</label></br>
                <input type="text" name="address" id="address" class="form-control ">
                <label>phone</label></br>
                <input type="text" name="phone" id="phone" class="form-control ">
                <label>gender</label></br>
                <input type="text" name="gender" id="gender" class="form-control ">
                
                @foreach ($errors->get('DataOfBirth') as $message)
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
