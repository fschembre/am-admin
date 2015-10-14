@include('includes.head')
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="{{ url() }}">RL Admin System</a></li>
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
        border-radius: 5px;">
        <div align="center">
            <h2 class="form-signup-heading">Please sign up</h2>
            <form method="POST" action="/auth/register">
                <div align="left" style="width:300px;margin-top: 50px">
                    <div>
                        Name
                        <input class="form-control" type="text" name="name" value="" style=" height:40px;">
                    </div>
                    <div>
                        Email
                        <input class="form-control" type="email" name="email" value="" style=" height:40px;">
                    </div>

                    <div>
                        Password
                        <input class="form-control" type="password" name="password" style=" height:40px;">
                    </div>

                    <div>
                        Confirm Password
                        <input class="form-control" type="password" name="password_confirmation" style=" height:40px;">
                    </div>

                    <div style="margin-top:50px">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom:20px;">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
