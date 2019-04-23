<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <script type='text/javascript'src="https://code.jquery.com/jquery-3.4.0.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='customjs.js'></script>
</head>
<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Class</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar" >
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="{{ Request::path() == 'insert' ? 'active' : '' }}"><a href="/insert">New Entry</a></li>
                <li class="{{ Request::is('manage/*') ? 'active' : '' }}"><a href="/manage/1">Manage Entries</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {!! $user !!}
              </ul>
            </div>
        </div>
</nav>
<div class="container">
@yield('container')
</div>
<footer class="page-footer navbar-fixed-bottom">
    <div class="footer-copyright text-center py-3">
        © 2019 Copyright: NOT
    </div>
</footer>
</body>
</html>
