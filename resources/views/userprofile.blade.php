@extends('layouts.app')

@section('content')

    <div class="container" style="padding-top: 200px; text-align: center">
        

        <strong >User Name :</strong>{{ $user->name }}
        <br>
        <strong>Email :</strong>{{ $user->email }}
        <br>
        <strong>Univeristy :</strong>{{ $user->univeristy}}
        <br>
        <strong>created_at :</strong>{{ $user->created_at}}

    </div>

@endsection
