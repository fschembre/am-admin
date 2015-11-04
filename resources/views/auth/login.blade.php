@include('includes.head')
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="{{ url() }}">Admin System</a></li>
    </ul>
</div>
<nav class="navbar navbar-default" style="background-color: #eee"></nav>

<body style="background-color: #fff">

<div style="
    display: inline-block;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 450px;
    height: 500px;
    margin: auto;
    background-color: #eee;
    padding:20px;
    border-radius: 5px">

    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <div align="center">
                    <h2 class="form-signin-heading">Please sign in</h2>
            <div align="center" style="width:300px;margin-top: 50px">

                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus style="height:40px;margin-bottom: 10px;">
                    <input class="form-control"type="password" name="password" id="password" placeholder="Password" required style="height:40px;margin-bottom: 40px;">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom:20px;">Sign in</button>
                    <div align="center" style="margin-bottom:20px;"><a href="#" >Forgot your email or password?</a></div><hr>
                    <a href="{{ url() }}/auth/register" class="btn btn-lg btn-default btn-block" style="background-color: #d2dbe1">Sign Up</a>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    </form>

</div>
</body>

</html>


