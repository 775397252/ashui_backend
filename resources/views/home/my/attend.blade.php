@extends('layouts.home_app_core')
@section('content')
    @include('home.my.left')
        <div class="clearfix"></div>
        <div class="container">
                <div class="starter-template">

                    <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">我关注的用户</div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    @foreach($attend as $v)
                                    <li class="list-group-item">用户ID：{{$v->attend_user_id}}，用户名:{{$v->username}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        </div>
                </div>
        </div><!-- /.container -->
        <script>
            function addclick(){
                var uid=<?php $id=session('member_id'); if($id) echo $id;else echo 0; ?>;
                if(uid==0){
                    alert('请先登录！')
                    $('.collapse').collapse('hide');
                    return false;
                }
                if($("#to_user_id").val()==''){
                    alert('请先填写用户id！')
                    return false;
                }
                if($("#content").val()==''){
                    alert('请先填写内容！')
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "{{url('ashui/meet/dove')}}",
                    data: {
                        _token:'{{ csrf_token() }}',
                        user_id:uid,
                        to_user_id:$("#to_user_id").val(),
                        content:$("#content").val(),
                    },
                    dataType: "json",
                    success: function(data){
                        if(data.state==1){
                            alert(data.msg)
                            $("#to_user_id").val('')
                            $("#content").val('')

                        }else{
                            alert(data.msg)
                        }
                    }
                });
            }
        </script>
@endsection
