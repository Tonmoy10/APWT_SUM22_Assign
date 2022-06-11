@extends('Layout.after')
@section('content')
    <br>
    <h3>
        @foreach ($data as $dt)
        <b>Name: </b>{{$dt->Name}}<br>
        <b>ID: </b>{{$dt->ID}}<br>
        <b>Email: </b>{{$dt->Email}}<br>
        <b>Type: </b>{{$dt->Type}}
        <br><br>    
        @endforeach
    </h3>
@endsection