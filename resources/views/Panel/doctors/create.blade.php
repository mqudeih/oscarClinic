@extends('Panel.layouts.index')
@section('content')
    <div class="card">
        <div class="card-header">Doctor Page</div>
        <div class="card-body">

            <form action="{{ route('doc.store') }}" method="POST">
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
                {{-- </br><label>User_id</label></br>
                <input type="id" name="User_id" id="User_id" class="form-control ">
                @foreach ($errors->get('User_id') as $message)
                    <span class="error">
                        {{ $message }}*
                    </span>
                @endforeach
                </br> --}}

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
