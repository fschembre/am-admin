@include('includes.head')

<body>
<div id="wrapper">

    <div>
        @include('includes.sidebar')
        @include('includes.header')
    </div>

    <div id="main" class="row"  style="margin-left: 30px;">

        @yield('content')
    </div>

    <div>
        @include('includes.footer')
    </div>

</div>
</body>