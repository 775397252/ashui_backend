@extends('layouts.home_app')
@section('content')
        <div class="starter-template">
                <div class="pull-left"><h1 class="text-info">阿水姑娘</h1></div>
                <br>
                <br>
                <br>
                <br>
                <br>
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
                <div class="col-lg-4">
                        <img src="{{asset('login.jpg')}}" alt="">
                </div>
                <div class="col-lg-8">
                        <form class="form-horizontal" method="post" action="">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                        <label for="" class="col-sm-4 control-label">注册手机号：</label>
                                        <div class="col-sm-5">
                                                <input type="text" name="phone" class="form-control" id="" placeholder="手机">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="" class="col-sm-4 control-label">密码：</label>
                                        <div class="col-sm-5">
                                                <input type="password" name="password" class="form-control" id="" placeholder="密码">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="" class="col-sm-4 control-label">验证码：</label>
                                        <div class="col-sm-3">
                                                <input type="text" name="captcha" class="form-control" id="" placeholder="密码">
                                        </div>
                                        <div class="col-sm-2">
                                                <img onclick="$('#qq').attr('src','{{ URL('captcha/') }}'+'/'+ Math.random());" src="{{ URL('/captcha/1') }}" alt="验证码" title="刷新图片" width="100" height="40" id="qq" border="0" />
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-5">
                                                <button type="submit" class="btn alert-danger">登陆</button>
                                        </div>
                                </div>
                        </form>
                </div>
        </div>
@endsection
