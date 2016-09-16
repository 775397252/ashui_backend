@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">创建图书</h1>
        </div>
    </div>
    @include('core-templates::common.errors')
    <div class="row">
        {!! Form::open(['route' => 'background.ashuiServicebook.store','files' => true]) !!}
                <!-- Title Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('bookname', '书名:') !!}
            {!! Form::text('bookname', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Content Field -->
        <div class="form-group col-sm-6 col-lg-6">
            {!! Form::label('price', '价格:') !!}
            {!! Form::number('price', null, ['class' => 'form-control']) !!}
        </div>
       <div class="form-group col-sm-6 col-lg-6">
           <label for="file">封面图：</label>
           <input type="file" name="file" id="file">
        </div>
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('content', '内容:') !!}
            <script id="container" name="content" type="text/plain"></script>
        </div>
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('background.biaobais.index') !!}" class="btn btn-default">取消</a>
        </div>

        {!! Form::close() !!}
    </div>
    <script src="{{ URL::asset('ueditor/ueditor.config.js')}}"></script>
    <script src="{{ URL::asset('ueditor/ueditor.all.js')}}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{initialFrameHeight:500,initialFrameWidth:800 });
    </script>
@endsection
