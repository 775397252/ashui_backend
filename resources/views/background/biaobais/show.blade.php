@extends('layouts.app')

@section('content')
    @include('background.biaobais.show_fields')

    <div class="form-group">
           <a href="{!! route('background.biaobais.index') !!}" class="btn btn-default">返回</a>
    </div>
@endsection
