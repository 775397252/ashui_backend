@extends('layouts.home_app')
@section('content')

        <div class="starter-template">
            <div class="pull-left"><h1 class="text-info">阿水姑娘</h1></div>
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
                <form class="form-horizontal" method="post" action="">
                    {!! csrf_field() !!}
                    <div class="form-group">
                                <label for="" class="col-sm-4 control-label">手机</label>
                                <div class="col-sm-5">
                                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="" placeholder="手机">
                                </div>
                        </div>
                   <div class="form-group">
                                <label for="" class="col-sm-4 control-label">用户名</label>
                                <div class="col-sm-5">
                                        <input type="text" name="username" value="{{old('username')}}" class="form-control" id="" placeholder="用户名">
                                </div>
                        </div>
                        {{--<div class="form-group">--}}
                                {{--<label for="" class="col-sm-4 control-label">短信验证码</label>--}}
                                {{--<div class="col-sm-5">--}}
                                        {{--<input type="email" class="form-control" id="" placeholder="短信验证码">--}}
                                {{--</div>--}}
                                {{--<button type="button" class="btn col-sm-2 bg-primary">发送验证码</button>--}}
                        {{--</div>--}}

                        <div class="form-group">
                                <label for="" class="col-sm-4 control-label">邮箱</label>
                                <div class="col-sm-5">
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="" placeholder="邮箱">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="" class="col-sm-4 control-label">学校</label>
                                <div class="col-sm-5">
                                        <input type="text" name="school" value="电子科技大学" readonly class="form-control" id="" placeholder="学校">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="" class="col-sm-4 control-label">密码</label>
                                <div class="col-sm-5">
                                        <input type="password" name="password" value="{{old('password')}}" class="form-control" id="" placeholder="密码">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="" class="col-sm-4 control-label">再次输入密码</label>
                                <div class="col-sm-5">
                                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="" placeholder="再次输入密码">
                                </div>
                        </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">验证码：</label>
                        <div class="col-sm-3">
                            <input type="text" name="captcha" class="form-control" id="" value="{{old('captcha')}}" placeholder="密码">
                        </div>
                        <div class="col-sm-2">
                            <img onclick="$('#qq').attr('src','{{ URL('captcha/') }}'+'/'+ Math.random());" src="{{ URL('/captcha/1') }}" alt="验证码" title="刷新图片" width="100" height="40" id="qq" border="0" />
                        </div>
                    </div>
                    <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-5">
                                        <button type="submit" class="btn alert-danger">立即注册</button>
                                </div>
                        </div>
                </form>

        </div>
@endsection
