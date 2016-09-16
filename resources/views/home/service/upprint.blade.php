@extends('layouts.home_app_core')
@section('content')
    @include('layouts.home_core_left')

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
                    <label for="" class="col-sm-4 control-label">备注（电话，地址，彩印等）：</label>
                    <div class="col-sm-5">
                        <textarea name="other" class="form-control" id="" cols="30" rows="5"></textarea>
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
