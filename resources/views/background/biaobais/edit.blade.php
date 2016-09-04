@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">编辑 Biaobai</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($biaobai, ['route' => ['background.biaobais.update', $biaobai->id], 'method' => 'patch']) !!}

            @include('background.biaobais.fields')

            {!! Form::close() !!}
        </div>
@endsection
