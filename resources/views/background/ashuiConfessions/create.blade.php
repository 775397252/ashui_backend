@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">创建 AshuiConfession</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'background.ashuiConfessions.store']) !!}

            @include('background.ashuiConfessions.fields')

        {!! Form::close() !!}
    </div>
@endsection
