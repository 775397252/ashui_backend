@extends('layouts.home_app_core')
@section('content')
    <div class="col-xs-3" class="pull-left" style="margin-top: 100px;width: 100px;z-index: 100;position: fixed">
        <ul class="nav nav-tabs nav-stacked" >
            <li ><a href="#section-1">打印</a></li>
            <li><a href="#section-2">书籍</a></li>
            <li><a href="#section-2">社区</a></li>
        </ul>
    </div>
      <div class="clearfix"></div>
        <div class="container">
    <div class="starter-template">

            <span style="margin: 10px;"><h3>你一共需要支付需要{{$money}}元,谢谢你的信任！</h3></span>
        <img src="{{asset('pay.png')}}" alt="">
        </div>
    </div>
</div>
@endsection
