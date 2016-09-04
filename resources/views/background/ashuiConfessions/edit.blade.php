@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">编辑 AshuiConfession</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($ashuiConfession, ['route' => ['background.ashuiConfessions.update', $ashuiConfession->id], 'method' => 'patch']) !!}

            @include('background.ashuiConfessions.fields')

            {!! Form::close() !!}
        </div>
@endsection
