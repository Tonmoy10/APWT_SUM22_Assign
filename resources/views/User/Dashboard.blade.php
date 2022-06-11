@extends('Layout.after')
@section('content')
{{-- <h2>Welcome, {{$Items[0]->Type}}</h2> --}}
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        @foreach ($Items as $it)
        <tr>
            <td>{{$it->ID}}</td>
            <td><a href="{{route('Information',['Id'=>$it->ID])}}">{{$it->Name}}</a></td>
        </tr>
        {{-- <td><a href="{{route('student.details',['id'=>$it->Name])}}">{{$st->name}}</a></td>   --}}
        @endforeach

    </table>
@endsection