<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', '电话:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', '邮箱:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- School Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school', '学校:') !!}
    {!! Form::text('school', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', '密码:') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Love Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_love', '是否恋爱:') !!}
    {!! Form::text('is_love', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', '地址:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('background.members.index') !!}" class="btn btn-default">取消</a>
</div>
