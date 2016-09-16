@extends('layouts.home_app_core')
@section('content')
    @include('layouts.home_core_left')

      <div class="clearfix"></div>
        <div class="container">
    <div class="starter-template">

            <span style="margin: 10px;"><h3>你一共需要支付需要{{$money}}元,谢谢你的信任！</h3></span>
        <img src="{{asset('pay.png')}}" alt="">
        </div>
    </div>
</div>
@endsection
