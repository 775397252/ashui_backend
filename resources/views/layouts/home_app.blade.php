<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ashui</title>
    <link href="{{ URL::asset('Home/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <a href="/"> <span class="sr-only pull-left">阿水姑娘 我们的舞台 我们的时代</span></a>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">阿水姑娘 我们的舞台 我们的时代</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('ashui/share')}}">游客浏览</a></li>
                <li><a href="{{url('register')}}">注册</a></li>
                <li><a href="{{url('login')}}">登录</a></li>
            </ul>
        </div>
    </div>
</nav>
    @yield('content')
</body>
</html>
<script src="{{ URL::asset('Home/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('Home/js/bootstrap.min.js')}}"></script>