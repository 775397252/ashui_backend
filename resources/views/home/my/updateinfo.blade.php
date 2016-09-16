@extends('layouts.home_app_core')
@section('content')
    @include('home.my.left')
        <div class="clearfix"></div>
        <div class="container">
                <div class="starter-template">
                    <label style="margin: 20px;color: red" for="">注意：不输入密码则不修改密码</label>
                    <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                        <form class="form-horizontal" method="post" action="" onsubmit="return check()">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">手机</label>
                                <div class="col-sm-5">
                                    <input type="text" name="phone" value="{{$info->phone}}" class="form-control" id="" placeholder="手机">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">用户名</label>
                                <div class="col-sm-5">
                                    <input type="text" name="username" value="{{$info->username}}" class="form-control" id="" placeholder="用户名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">新密码</label>
                                <div class="col-sm-5">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="新密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">确认新密码</label>
                                <div class="col-sm-5">
                                    <input type="password" name="rpassword" id="rpassword" class="form-control" id="" placeholder="确认新密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">学校</label>
                                <div class="col-sm-5">
                                    <input type="text" name="school" value="电子科技大学" readonly class="form-control" id="" placeholder="学校">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">恋爱状况</label>
                                <div class="col-sm-5">
                                    <label class="radio-inline">
                                        <input type="radio" @if($info->is_love==1)checked @endif name="is_love" id=""  value="1">是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" @if($info->is_love!=1)checked @endif name="is_love" id="" value="o">否
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">现居住地</label>
                                <div class="col-sm-5">
                                    <input type="text" name="address" value="{{$info->address}}" class="form-control" id="" placeholder="现居住地">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-5">
                                    <button type="submit" class="btn alert-danger">修改</button>
                                </div>
                            </div>
                        </form>

                        </div>
                </div>
        </div><!-- /.container -->
    <script>
        function check(){
            if($('#password').val()!=$('#rpassword').val()){
                alert('确认密码和密码不一致！');
                return false;
            }
        }
    </script>
@endsection
