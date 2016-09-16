@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>
            用户管理
            <small>
                <i class="icon-double-angle-right"></i>
                阿水广场
            </small>
        </h1>
    </div>
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <table class="table table-striped table-bordered table-hover" id="ashuiConfessions-table">
        <thead>
        <th>id</th>
        <th>用户名</th>
        <th>标题</th>
        <th>权重</th>
        <th>内容</th>
        <th>创建日期</th>
        <th colspan="3">操作</th>
        </thead>
        <tbody>
        @foreach($list as $ashuiConfession)
            <tr>
                <td>{!! $ashuiConfession->id !!}</td>
                <td>{!! $ashuiConfession->username !!}</td>
                <td>{!! $ashuiConfession->weight !!}</td>
                <td><?php echo $ashuiConfession->title;?></td>
                <td>{!! $ashuiConfession->content !!}</td>
                <td>{{$ashuiConfession->created_at }}</td>
                <td>
                    <div class='btn-group'>
                        <a onclick="return confirm('你确定要删除?')" href="{!! url('background/ashuiPlace/delete', [$ashuiConfession->id]) !!}" class='btn btn-danger btn-xs'>
                            <i class="glyphicon glyphicon-edit">删除</i></a>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $list->render() !!}
@endsection
