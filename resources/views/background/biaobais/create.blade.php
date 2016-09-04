@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">创建 Biaobai</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'background.biaobais.store']) !!}

            @include('background.biaobais.fields')

        {!! Form::close() !!}
    </div>
@endsection
