@extends('layouts.app')

@section('content')
    @include('background.ashuiConfessions.show_fields')

    <div class="form-group">
           <a href="{!! route('background.ashuiConfessions.index') !!}" class="btn btn-default">返回</a>
    </div>
@endsection
