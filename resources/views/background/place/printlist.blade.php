@extends('layouts.app')

@section('content')
        <div class="page-header">
            <h1>
                用户管理
                <small>
                    <i class="icon-double-angle-right"></i>
                     添加阿水分享
                </small>
            </h1>
        </div>
        <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! route('background.ashuiConfessions.create') !!}">添加</a>
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <table class="table table-striped table-bordered table-hover" id="ashuiConfessions-table">
            <thead>
            <th>id</th>
            <th>页数</th>
            <th>价格</th>
            <th>文件</th>
            <th>上传用户</th>
            <th colspan="3">操作</th>
            </thead>
            <tbody>
            @foreach($list as $ashuiConfession)
                <tr>
                    <td>{!! $ashuiConfession->id !!}</td>
                    <td>{!! $ashuiConfession->number !!}</td>
                    <td><?php echo $ashuiConfession->number*0.1+0.5;?></td>
                    <td><a href="{{$ashuiConfession->file }}">下载</a></td>
                    <td>{{$ashuiConfession->username }}</td>
                    <td>
                        <div class='btn-group'>
                            <a onclick="return confirm('你确定要删除?')" href="{!! url('background/ashuiServiceprint/deleteprint', [$ashuiConfession->id]) !!}" class='btn btn-danger btn-xs'>
                                <i class="glyphicon glyphicon-edit">删除</i></a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $list->render() !!}
@endsection
