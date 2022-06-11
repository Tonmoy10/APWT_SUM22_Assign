@extends('Layout.prior')
@section('content')
<form action="" method="post">
    {{ csrf_field() }}
    <h3>Please select user type</h3>
    <input type="radio" name="user" value="Admin">Admin
    <input type="radio" name="user" value="User" checked>User<br>
    <input type="submit" value="Next">
</form>
    
@endsection