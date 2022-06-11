@extends('Layout.prior')
@section('content')
    <form method="post" action="">
        {{ csrf_field() }}
        <h2><b>User Registration Form</b></h2><br><br>
        Name: <input type="text" name="Name" value={{old('Name')}}><br>
        @error('Name')
            {{$message}} <br>
        @enderror
        Email: <input type="email" name="Email" value={{old('Email')}}><br>
        @error('Email')
            {{$message}} <br>
        @enderror
        Password: <input type="Password" name="Password"><br>
        @error('Password')
            {{$message}} <br>
        @enderror
        Confirm Password: <input type="Password" name="Confirm"><br>
        @error('Confirm')
            {{$message}} <br>
        @enderror
        <input type="submit" name="">

    </form>
@endsection