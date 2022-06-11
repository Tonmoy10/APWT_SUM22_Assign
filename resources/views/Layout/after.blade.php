<html>
    <h2><b>Hello Sir,</b></h2><br>
    <a href="{{route('Dashboard')}}"> View List</a> &nbsp; &nbsp;
    <a href="{{route('Details')}}">Details</a> &nbsp; &nbsp;
    <a href="{{route('Homepage')}}">LogOut</a><br><br>
    <div>
        @yield('content')
    </div>
</html>