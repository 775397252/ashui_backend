@extends('layouts.home_app_core')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('edit/css/wangEditor.min.css')}}">
    <link href="{{ URL::asset('Home/css/yifa.css')}}" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
        ul.nav-tabs{
            width: 140px;
            margin-top: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
        }
        ul.nav-tabs li{
            margin: 0;
            border-top: 1px solid #ddd;
        }
        ul.nav-tabs li:first-child{
            border-top: none;
        }
        ul.nav-tabs li a{
            margin: 0;
            padding: 8px 16px;
            border-radius: 0;
        }
        #div1 {
            width: 100%;
            height: 200px;
        }
    </style>
    @include('home.place.left')
        <div class="clearfix"></div>
        <div class="container">
                <div class="starter-template">
                    <label style="margin: 20px;color: #00be67;font-size: 24px" for="">Free to talk and Be yourself</label>
                    <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                        <form method="post" action="{{url('ashui/place/yifa')}}" enctype="multipart/form-data" onsubmit="return addclick()">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <input type="text" name="title" style="font-size: 18px" class="form-control" id="title" placeholder="标题">
                            </div>
                           <div class="form-group">
                                <div id="div1">
                                    <script id="container" name="content" type="text/plain">
                                    </script>
                                </div>
                            </div>
                            <input type="hidden" value="<?=session('member_id')?>" name="user_id" id="">
                    <div class="form-group">
                    <input class="btn btn-default pull-right" type="submit" value="发布">
                            <label class="checkbox-inline">
                                <input type="radio" name="type" checked id="inlineCheckbox1" value="0"> 所有人可见
                            </label>
                            {{--<label class="checkbox-inline">--}}
                                {{--<input type="radio" name="is_see" value="1"> 关注我的人可见--}}
                            {{--</label>--}}
                            <label class="checkbox-inline">
                                <input type="radio" name="type" value="2"> 只有我可见
                            </label>
                        <label class="checkbox-inline">
                                <input type="radio" name="type" value="3"> 匿名发表
                            </label>
                        </div>
                        </form>
                        </div>
                </div>
        </div><!-- /.container -->

        <script>
            function addclick(){
                var uid=<?php $id=session('member_id'); if($id) echo $id;else echo 0; ?>;
                if(uid==0){
                    alert('请先登录！')
                    return false;
                }
                if($("#title").val()==''){
                    alert('请先填写标题！')
                    return false;
                }

                {{--$.ajax({--}}
                    {{--type: "POST",--}}
                    {{--url: "{{url('ashui/place/yifa')}}",--}}
                    {{--data: {--}}
                        {{--_token:'{{ csrf_token() }}',--}}
                        {{--title:$("#title").val(),--}}
                        {{--type:$("input[type='radio']:checked").val(),--}}
                        {{--content:$("#div1").html(),--}}
                        {{--user_id:uid,--}}
                    {{--},--}}
                    {{--dataType: "json",--}}
                    {{--success: function(data){--}}
                        {{--if(data.state==1){--}}
                            {{--alert(data.msg)--}}
                            {{--$("#title").val('')--}}
                            {{--$("#div1").html('')--}}
                        {{--}else{--}}
                            {{--alert(data.msg)--}}
                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            }
        </script>
@endsection
@section('script')

    <script src="{{ URL::asset('ueditor/ueditor.config.js')}}"></script>
    <script src="{{ URL::asset('ueditor/ueditor.all.js')}}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            toolbars: [
                ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload', 'italic',
                    'underline',
                    'strikethrough',
                    'subscript',]
            ],
            autoHeightEnabled: false,
            initialFrameHeight:150,
         });
    </script>
@endsection