<table class="table table-striped table-bordered table-hover" id="ashuiConfessions-table">
    <thead>
        <th>Type</th>
        <th>Typr Name</th>
        <th>Title</th>
        <th>Content</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($ashuiConfessions as $ashuiConfession)
        <tr>
            <td>{!! $ashuiConfession->type !!}</td>
            <td>{!! $ashuiConfession->typr_name !!}</td>
            <td>{!! $ashuiConfession->title !!}</td>
            <td>{!! $ashuiConfession->content !!}</td>
            <td>
                {!! Form::open(['route' => ['background.ashuiConfessions.destroy', $ashuiConfession->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('background.ashuiConfessions.show', [$ashuiConfession->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-eye-open">查看</i></a>
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
