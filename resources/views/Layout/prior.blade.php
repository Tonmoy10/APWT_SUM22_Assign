<html>
    <h1><b>Welcome to the website</b></h1><br><br>
    <a href="{{route('PreReg')}}"> Register </a> &nbsp; &nbsp;
    <a href="{{route('Login')}}"> Log in </a><br><br>
    <div>
        @yield('content')
    </div>
</html>