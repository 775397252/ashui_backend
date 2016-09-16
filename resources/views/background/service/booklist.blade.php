@extends('layouts.app')

@section('content')
        <div class="page-header">
            <h1>
                用户管理
                <small>
                    <i class="icon-double-angle-right"></i>
                     添加阿水图书
                </small>
            </h1>
        </div>
        <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! url('background/ashuiServicebook/add') !!}">添加</a>
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <table class="table table-striped table-bordered table-hover" id="ashuiConfessions-table">
            <thead>
            <th>id</th>
            <th>书名</th>
            <th>价格</th>
            <th>图片</th>
            <th>创建日期</th>
            <th colspan="3">操作</th>
            </thead>
            <tbody>
            @foreach($list as $ashuiConfession)
                <tr>
                    <td>{!! $ashuiConfession->id !!}</td>
                    <td>{!! $ashuiConfession->bookname !!}</td>
                    <td><?php echo $ashuiConfession->price;?></td>
                    <td><img width="50px;" height="50px" src="{!! $ashuiConfession->file !!}" alt=""></td>
                    <td>{{$ashuiConfession->created_at }}</td>
                    <td>
                        <div class='btn-group'>
                            <a onclick="return confirm('你确定要删除?')" href="{!! url('background/ashuiServicebook/deletebook', [$ashuiConfession->id]) !!}" class='btn btn-danger btn-xs'>
                                <i class="glyphicon glyphicon-edit">删除</i></a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $list->render() !!}
@endsection
