<nav class="navbar navbar-default" style="background-color: #eee">
    <div class="container-fluid" >
        <div class="navbar-header" style="margin-left: -15px">
            <a href="#menu-toggle" id="menu-toggle" class="btn btn-sm btn-default" style="border: hidden;background-color:#d2dbe1;height:48px;width: 48px;border-bolor:#ccc">
                <span class="glyphicon glyphicon-align-justify" style="margin-top:10px"></span> </a>
        </div>
        @if (Auth::check())
        <div style="float:right">
            <a href="auth/logout" id="menu-toggle" class="btn btn-sm btn-default" style="border: hidden;background-color:#d2dbe1;height:48px;width: 48px;border-bolor:#ccc">
                <span class="glyphicon glyphicon-log-out" style="margin-top:10px"></span> </a>
        </div>
        @endif
    </div>
</nav>

