@extends('layouts.home_app_core')
@section('content')
    @include('home.my.left')
    <link href="{{ URL::asset('Home/css/messageboard.css')}}" rel="stylesheet">
        <div class="clearfix"></div>
        <div class="container">
                <div class="starter-template">

                    <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                        <button type="button" disabled class="btn btn-warning pull-left">用户ID：{{$id}}</button>
                    @if($attend==0)
                            <button type="button" onclick="attent($(this))" class="btn btn-warning pull-right">关注+</button>
                        @else
                            <button type="button" onclick="attent($(this))" disabled class="btn btn-warning pull-right">已关注</button>
                        @endif
                        <br><br><br><br>
                        <form role="form" method="post" action="" onsubmit="return check(this)">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group ">
                                    <textarea class="form-control" name="comment" style="font-size: 18px" id="comment" cols="90" rows="10" placeholder="想说点什么"></textarea>
                                </div>
                                <input type="hidden" name="to_user_id" value="{{$id}}">
                                <input type="hidden" name="user_id" value="{{session('member_id')}}">
                                <button type="submit" class="btn btn-lg btn-danger pull-right">留言</button>
                            </form>
                            <br>
                            <br>
                            <br>
                            <br>
                                @foreach($share as $k=>$v)
                                <article style="margin: 10px" class="post">
                                        <div class="post-head">
                                                <h4 class="post-title pull-left" style="line-height: 1.45; letter-spacing: 1px; text-align: left">
                                                    <a href="{{url('ashui/messageboard',[$v->users->id])}}">
                                                        {{$v->users->username}}
                                                    </a>:{{$v->comment}}
                                                </h4>
                                                <div class="clearfix"></div>
                                                <time class="post-date pull-left">{{$v->created_at}}</time>
                                                <div class="clearfix"><h3></h3></div>
                                        </div>
                                </article>
                                <hr>
                                @endforeach
                                <nav>
                                    {!! $share->render() !!}
                                </nav>
                        </div>
                </div>
        </div><!-- /.container -->
    <script type="text/javascript">
        function attent(p){
            var uid=<?php $id=session('member_id'); if($id) echo $id;else echo 0; ?>;
            if(uid==0){
                alert('请先登录！')
                $('.collapse').collapse('hide');
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{url('ashui/attend')}}",
                data: {
                    attend_user_id:'{{$id}}',
                    user_id:uid,
                },
                dataType: "json",
                success: function(data){
                    if(data.state==1){
                        alert(data.msg)
                        p.attr("disabled",true);
                        p.html('已关注')
                    }
                }
            });
        }
        function check(form) {
            if(form.comment.value=='') {
                alert("请说点什么吧!");
                form.userId.focus();
                return false;
            }
            return true;
        }
    </script>
@endsection
