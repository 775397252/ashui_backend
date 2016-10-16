<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ashui</title>
    <link href="{{ URL::asset('Home/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('Home/css/home_app_core.css')}}" rel="stylesheet">
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
            <a class="navbar-brand as_title" href="#">
                {{$title or ""}}
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">
            <ul class="nav navbar-nav">
               <li @if($light==1) class="active" @endif><a href="{{url('ashui/top')}}">阿水头条</a></li>
                <li @if($light==2) class="active" @endif><a href="{{url('ashui/place')}}">阿水广场</a></li>
                <li @if($light==3) class="active" @endif><a href="{{url('ashui/meet')}}">阿水相遇</a></li>
                <li @if($light==4) class="active" @endif><a href="{{url('ashui/share')}}">阿水分享</a></li>
                <li @if($light==5) class="active" @endif><a href="{{url('ashui/service/upprint')}}">阿水服务</a></li>
                @if(session('member_id'))
                    <li @if($light==6) class="active" @endif><a href="{{url('my/index')}}">user：{{session('member_name')}}</a></li>
                    <li><a href="{{url('logout')}}">退出</a></li>
                {{--<li><a href="javascript:void(0)">用户名：{{session('member_name')}}</a></li>--}}
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
