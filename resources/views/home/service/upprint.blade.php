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
        <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
            <div class="alert alert-danger">
               @if($errors->count()==0)
                    <span style="margin: 50px;">阿水打印</span>
                 @endif
                <ul style="color:red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <span style="margin: 10px;"><h3>请认真填写资料页数，否则无法上传</h3></span>
            <form action="{{url('ashui/service/printprice')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">填写资料页数</label>
                    <div class="col-sm-5">
                        <input type="number" name="number" class="form-control" id="" placeholder="填写资料页数">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">上传资料</label>
                    <div class="col-sm-5">
                        <input id="file" name="file" type="file"  >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn bg-primary">资料上传</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
