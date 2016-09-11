
<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', '标题:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <label for="type">选择类型：</label>
    <select name="type" id="type">
        <option value="0"
                @if($ashuiConfession->type ==0 )
                selected
                @endif
        >文章</option>
        <option value="1" @if($ashuiConfession->type ==1 ) selected @endif>视频</option>
        <option value="2" @if($ashuiConfession->type ==2 ) selected @endif>音乐</option>
        <option value="3" @if($ashuiConfession->type ==3 ) selected @endif>图片</option>
    </select>
</div>
<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', '内容:') !!}
    <script id="container" name="content" type="text/plain">
        {!!$ashuiConfession->content!!}
    </script>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('background.ashuiConfessions.index') !!}" class="btn btn-default">取消</a>
</div>
<script src="{{ URL::asset('ueditor/ueditor.config.js')}}"></script>
<script src="{{ URL::asset('ueditor/ueditor.all.js')}}"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{initialFrameHeight:500,initialFrameWidth:800 });
</script>
