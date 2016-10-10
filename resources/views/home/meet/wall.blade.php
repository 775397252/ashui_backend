@extends('layouts.home_app_core')
@section('content')
    @include('home.meet.left')
        <div class="clearfix"></div>
        <div class="container">
                <div class="starter-template">
                    <label style="margin: 20px;color: #00be67" for="">似水流年，花样年华，在这里相遇，邂逅你，遇见美好</label>

                    <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                            <form role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="title" placeholder="标题">
                                </div>
                                <div class="form-group ">
                                    <textarea class="form-control" name="" id="content" cols="90" rows="10" placeholder="表白内容，最多100字"></textarea>
                                </div>
                                <button type="button" onclick="addclick()" class="btn btn-default pull-right">发表</button>
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
                if($("#title").val()==''){
                    alert('请先填写标题！')
                    return false;
                }
                if($("#content").val()==''){
                    alert('请先填写内容！')
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "{{url('ashui/meet/wall')}}",
                    data: {
                        _token:'{{ csrf_token() }}',
                        title:$("#title").val(),
                        content:$("#content").val(),
                        user_id:uid,
                    },
                    dataType: "json",
                    success: function(data){
                        if(data.state==1){
                            alert(data.msg)
                            $("#title").val('')
                            $("#content").val('')
                        }else{
                            alert(data.msg)
                        }
                    }
                });
            }
        </script>
@endsection
