@extends('layouts.home_app_core')
@section('content')
    @include('home.place.left')
        <div class="clearfix"></div>
        <div class="container">
                <div class="starter-template">
                    <label style="margin: 20px;color: #00be67" for="">暗恋，也是一道风景</label>

                    <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            查看我的表白信息
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <ul style="text-align: left">
                                            @foreach($has as $v)
                                            <li>{{$v->content}}<span style="color: red">({{$v->created_at}})</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse"
                                           aria-expanded="false" aria-controls="collapse">
                                            查看我的互相喜欢信息
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
                                    <div class="panel-body">
                                        <ul style="text-align: left">
                                            @foreach($say as $v)
                                            <li>{{$v->username}}说：{{$v->content}}<span style="color: red">({{$v->created_at}})</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form role="form">
                                <div class="form-group">
                                    <input type="text"  class="form-control" id="to_user_id" placeholder="TA的ID">
                                </div>
                                <div class="form-group ">
                                    <textarea class="form-control" name="" id="content" cols="90" rows="10" placeholder="想对他说啥，最多100字"></textarea>
                                </div>
                                <button type="button" onclick="addclick()" class="btn btn-lg btn-danger pull-right">发表</button>
                            </form>
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
