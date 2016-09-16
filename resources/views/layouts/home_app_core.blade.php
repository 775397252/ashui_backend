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
        ul.nav-tabs{
            width: 140px;
            margin-top: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
        }
        ul.nav-tabs li{
            margin: 0;
            border-top: 1px solid #ddd;
        }
        ul.nav-tabs li:first-child{
            border-top: none;
        }
        ul.nav-tabs li a{
            margin: 0;
            padding: 8px 16px;
            border-radius: 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only pull-left">阿水姑娘 我们的舞台 我们的时代</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">阿水头条 今天你是头条么</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">
            <ul class="nav navbar-nav">
               <li><a href="#">阿水头条</a></li>
                <li><a href="{{url('ashui/place')}}">阿水广场</a></li>
                <li><a href="{{url('ashui/meet')}}">阿水相遇</a></li>
                <li><a href="{{url('ashui/share')}}">阿水分享</a></li>
                <li><a href="rigister.html">我的阿水</a></li>
                <li><a href="{{url('ashui/service/upprint')}}">阿水服务</a></li>
                @if(session('member_id'))
                <li><a href="{{url('logout')}}">退出</a></li>
                <li><a href="javascript:void(0)">用户名：{{session('member_name')}}</a></li>
                    @else
                    <li><a href="{{url('login')}}">登录</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
<script src="{{ URL::asset('Home/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('Home/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('edit/js/wangEditor.min.js')}}"></script>
@yield('script')
