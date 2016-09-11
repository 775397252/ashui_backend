<table class="table table-striped table-bordered table-hover" id="ashuiConfessions-table">
    <thead>
        <th>标题</th>
        <th>内容</th>
        <th>类型</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($ashuiConfessions as $ashuiConfession)
        <tr>
            <td>{!! $ashuiConfession->title !!}</td>
            <td>{{str_limit($ashuiConfession->content,100) }}</td>
            <td>{!! $ashuiConfession->typr_name !!}</td>
            <td>
                {!! Form::open(['route' => ['background.ashuiConfessions.destroy', $ashuiConfession->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('background.ashuiConfessions.edit', [$ashuiConfession->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-edit">编辑</i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">删除</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定要删除?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
