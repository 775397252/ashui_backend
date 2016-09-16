@extends('layouts.home_app_core')
@section('content')
    @include('layouts.home_core_left')
    <div class="clearfix"></div>
    <div class="container">
        <div class="starter-template">
            <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><font color="red">商品名称：</font>{{$book->bookname}}</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group" style="text-align: left">
                            <li class="list-group-item"><font color="red">商品图片：</font><img width="500px" height="250px" src="{{$book->file}}" alt=""></li>
                            <li class="list-group-item"><font color="red">商品价格：</font>{{$book->price}}</li>
                            <li class="list-group-item"><font color="red">商品介绍：</font>{!! $book->content !!}</li>
                            <li class="list-group-item"><font color="red">支付账号：</font>  <img src="{{asset('pay.png')}}" alt=""></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /.container -->
@endsection
