@extends('Panel.layouts.index')
@section('content')
    <div class="card">
        <div class="card-header">Reception Page</div>
        <div class="card-body">

            <form action="{{ route('recepte.store') }}" method="post">
                @csrf
                <label>name</label></br>
                <input type="text" name="name" id="name" class="form-control ">
                @foreach ($errors->get('name') as $message)
                    <span class="error">
                        {{ $message }}*
                    </span>
                @endforeach
                </br>
                <label>email</label></br>
                <input type="email" name="email" id="email" class="form-control ">
                @foreach ($errors->get('email') as $message)
                    <span class="error">
                        {{ $message }}*
                    </span>
                @endforeach
                </br><label>password</label></br>
                <input type="password" name="password" id="password" class="form-control ">
                @foreach ($errors->get('password') as $message)
                    <span class="error">
                        {{ $message }}*
                    </span>
                @endforeach

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
