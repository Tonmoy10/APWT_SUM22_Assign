@extends('Layout.prior')
@section('content')
    <form method="post" action="">
        {{ csrf_field() }}
        <h2>Login Form</h2>
        Email: <input type="email" name="emailLog" value="{{old('emailLog')}}"><br>
        @error('emailLog')
            {{$message}}<br>
        @enderror
        Password: <input type="password" name="passLog"><br>
        @error('passLog')
            {{$message}}<br>
        @enderror
        <input type="submit" name="login" value="Login">
    </form>
@endsection