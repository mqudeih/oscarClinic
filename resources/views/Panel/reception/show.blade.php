@extends('Panel.layouts.index')
@section('content')
    <div class="card">
        <div class="card-header">Reception Page</div>
        <div class="card-body">
            <div class="card-body">
                <p class="card-text">name : {{ $reception->user ? $reception->user->name : ''  }}</p>
                <p class="card-text">email : {{ $reception->user ? $reception->user->email : ''  }}</p>
                <p class="card-text">password : {{ $reception->user ? $reception->user->password : '' }}</p>
                <p class="card-text">User_id : {{ $reception->User_id }}</p>
        


            </div>

            </hr>

        </div>
    </div>
@stop
