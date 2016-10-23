@extends('layouts.home_app_core')
@section('content')
    <link href="{{ URL::asset('Home/css/myas.css')}}" rel="stylesheet">
    @include('home.my.left')
    <div class="clearfix"></div>
    <div class="container">
        <div class="starter-template">
            <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                @foreach($share as $k=>$v)
                    <article style="margin: 10px" class="post">
                        <div class="post-head" >
                            <div class="myname">
                                <a href="{{url('ashui/messageboard',[$v->users->id])}}">{{$v->users->username}}</a>
                            </div>
                            <a href="{{url("my/deleteplace",[$v->id])}}" class="alert-danger">(删除)</a>

                            <div class="mytitle">
                                {{$v->title}}
                            </div>
                            <div>{{$v->created_at}}</div>
                        </div>
                        <div class="text-left">
                            <p>
                                {!! $v->content !!}
                            </p>
                            {{--评论点赞--}}
                            <div>
                                <a onclick="addclick({{$v->id}},$(this))" href="javascript:void(0)" class="pull-left" style="margin-left: 100px;">阿水GOOD
                                    <span class="label label-danger">{{$v->click}}</span>
                                </a>
                                <!--<a href="/post/laravel-turns-five/" class="pull-right" style="margin-right: 100px;">阿水评论 <span class="badge">2</span></a>-->
                                <div class="accordion pull-right" id="accordion2" class="" style="margin-right: 100px;">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$k}}">
                                                阿水评论
                                            </a>
                                        </div>
                                        <div id="collapse{{$k}}" class="accordion-body collapse" style="height: 0px; ">
                                            <div class="accordion-inner">
                                                <form>
                                                    <div class="form-group">
                                                        <textarea id="{{$v->id}}" name="" cols="60" rows=2 style="resize: none;"></textarea>
                                                    </div>
                                                    <input onclick="addcomment({{$v->id}})" class="btn btn-default pull-right" type="button" value="发布">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            {{--<span class="label label-default">评论</span><br><br>--}}
                            <div id="list_{{$v->id}}" class="clearfix col-xs-12">
                                @foreach($v->comments as $kk=>$vv)
                                    {{--<mark style="margin: 3px;">{{$vv->username}}:</mark>{{$vv->comment}} <br>--}}
                                    <a onclick="javascript:1" style="text-decoration:none;margin: 3px;">{{$vv->username}}:</a>{{$vv->comment}} <br>
                                @endforeach
                            </div>

                            {{--<a>查看所有>></a> <br>--}}

                            <footer class="post-footer clearfix">
                                <div class="pull-left tag-list">
                                    <i class="fa fa-folder-open-o"></i>
                                </div>
                                <div class="pull-right share">
                                </div>
                            </footer>
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
    <script>
        function addcomment(id){
            var comment=$("#"+id).val();
            var uid=<?php $id=session('member_id'); if($id) echo $id;else echo 0; ?>;
            if(uid==0){
                alert('请先登录！')
                $('.collapse').collapse('hide');
                return false;
            }
            if($.trim(comment)==''){
                alert('请输入评论内容！')
                $('.collapse').collapse('hide');
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{url('ashui/place/comment')}}",
                data: {
                    place_id:id,
                    user_id:uid,
                    comment:comment
                },
                dataType: "json",
                success: function(data){
                    if(data.state==1){
                        alert(data.msg)
                        $("#"+id).val('')
                        $('.collapse').collapse('hide');
                        var html='<mark style="margin: 3px;">{{session("member_name")}}:</mark>'+comment+'<br>';
                        $("#list_"+id).append(html);
                    }
                }
            });
        }
        function addclick(id,thi){
            var uid=<?php $id=session('member_id'); if($id) echo $id;else echo 0; ?>;
            if(uid==0){
                alert('请先登录！')
                $('.collapse').collapse('hide');
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{url('ashui/place/click')}}",
                data: {
                    place_id:id,
                    user_id:uid,
                },
                dataType: "json",
                success: function(data){
                    if(data.state==1){
                        alert(data.msg)
                        $temp=$(thi.children("span").get(0));
                        $temp.text(parseInt($temp.text())+1);
                    }else{
                        alert(data.msg)
                    }
                }
            });
        }
    </script>
@endsection
