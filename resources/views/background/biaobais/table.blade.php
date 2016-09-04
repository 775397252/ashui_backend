<table class="table table-striped table-bordered table-hover" id="biaobais-table">
    <thead>
        <th>标题</th>
        <th>内容</th>
        <th>对象</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($biaobais as $biaobai)
        <tr>
            <td>{!! $biaobai->title !!}</td>
            <td>{!! $biaobai->content !!}</td>
            <td>{!! $biaobai->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['background.biaobais.destroy', $biaobai->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('background.biaobais.show', [$biaobai->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-eye-open">查看</i></a>
                    <a href="{!! route('background.biaobais.edit', [$biaobai->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-edit">编辑</i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">删除</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定要删除?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
