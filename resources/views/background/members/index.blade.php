@extends('layouts.app')

@section('content')
        <div class="page-header">
            <h1>
                用户管理
                <small>
                    <i class="icon-double-angle-right"></i>
                     会员管理
                </small>
            </h1>
        </div>
        <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! route('background.members.create') !!}">添加</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('background.members.table')
        
@endsection
