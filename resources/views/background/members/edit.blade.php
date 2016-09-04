@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">编辑 Member</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($member, ['route' => ['background.members.update', $member->id], 'method' => 'patch']) !!}

            @include('background.members.fields')

            {!! Form::close() !!}
        </div>
@endsection
