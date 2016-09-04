@extends('layouts.home_app')
@section('content')
        <div class="starter-template">
                <div class="pull-left"><h1 class="text-info">阿水姑娘</h1></div>
                <div class="clearfix"></div>
                <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                                <label for="" class="col-sm-4 control-label">手机</label>
                                <div class="col-sm-5">
                                        <input type="email" class="form-control" id="" placeholder="手机">
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="" class="col-sm-4 control-label">密码</label>
                                <div class="col-sm-5">
                                        <input type="password" class="form-control" id="" placeholder="密码">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="" class="col-sm-4 control-label">验证码：</label>
                                <div class="col-sm-3">
                                        <input type="password" class="form-control" id="" placeholder="密码">
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
@endsection
