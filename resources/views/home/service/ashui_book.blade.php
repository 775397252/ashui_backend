@extends('layouts.home_app_core')
@section('content')
    @include('layouts.home_core_left')

    <!--<div class="pull-right"  style="width:20px;color: #2aabd2;">-->
    <!--<h2>我是竖列排版</h2>-->
    <!--</div>-->
    <div class="clearfix"></div>
    <div class="container">
        <div class="starter-template">
            <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                <div class="row">
                    @foreach($book as $v)
                    <div class="col-lg-4">
                        <img class="img-circle" src="{{$v->file}}" alt="没有图片。。。" width="140" height="140">
                        <h4>{{$v->bookname}}</h4>
                        <p class="text-danger">价格:{{$v->price}}元</p>
                        <p><a class="btn btn-default" href="{{url('ashui/service/book_detail',[$v->id])}}" role="button">立即购买</a></p>
                    </div><!-- /.col-lg-4 -->
                    @endforeach
                </div>
                <nav>
                    {!! $book->render() !!}
                </nav>
            </div>
        </div>
    </div><!-- /.container -->
@endsection
