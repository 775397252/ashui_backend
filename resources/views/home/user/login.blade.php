@extends('layouts.home_app')
@section('content')
    <link href="{{ URL::asset('Home/css/login.css')}}" rel="stylesheet">
    <div class="sign">
            <div class="top">
                <div class="as_girl" >阿水姑娘</div>
                <div class="top_btm">Welcom to ashuigirl</div>
            </div>
            <div class="clearfix"></div>
                @if (count($errors) > 0)
                        <div class="alert alert-danger">

                                <ul style="color:red;">
                                        @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                        @endforeach
                                </ul>
                        </div>
                @endif
                <div class="sign_left">
                        <img src="{{asset('login.jpg')}}" alt="">
                </div>
                <div class="sign_right">
                        <form class="form-horizontal" method="post" action="">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                        <label for="" class="col-sm-4 control-label"></label>
                                        <div class="col-sm-5">
                                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="" placeholder="邮箱">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="" class="col-sm-4 control-label"></label>
                                        <div class="col-sm-5">
                                                <input type="password" name="password" value="{{old('password')}}" class="form-control" id="" placeholder="密码">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="" class="col-sm-4 control-label"></label>
                                        <div class="col-sm-3 validate_input">
                                                <input type="text" name="captcha"  value="{{old('captcha')}}" class="form-control" id="" placeholder="验证码">
                                        </div>
                                        <div class="col-sm-2 validate">
                                                <img onclick="$('#qq').attr('src','{{ URL('captcha/') }}'+'/'+ Math.random());" src="{{ URL('/captcha/1') }}" alt="验证码" title="刷新图片" width="100" height="40" id="qq" border="0" />
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-5">
                                                <button type="submit" class="btn zc_now alert-danger">登陆</button>
                                        </div>
                                </div>
                        </form>
                </div>
        </div>
@endsection
