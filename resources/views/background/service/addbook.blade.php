@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">创建图书</h1>
        </div>
    </div>
    @include('core-templates::common.errors')
    <div class="row">
        {!! Form::open(['route' => 'background.biaobais.store']) !!}
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


        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('background.biaobais.index') !!}" class="btn btn-default">取消</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
