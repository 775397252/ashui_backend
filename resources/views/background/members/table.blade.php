<table class="table table-striped table-bordered table-hover" id="members-table">
    <thead>
        <th>电话</th>
        <th>邮件</th>
        <th>学校</th>
        <th>密码</th>
        <th>是否恋爱</th>
        <th>地址</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <td>{!! $member->phone !!}</td>
            <td>{!! $member->email !!}</td>
            <td>{!! $member->school !!}</td>
            <td>{!! $member->password !!}</td>
            <td>{!! $member->is_love !!}</td>
            <td>{!! $member->address !!}</td>
            <td>
                {!! Form::open(['route' => ['background.members.destroy', $member->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('background.members.show', [$member->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-eye-open">查看</i></a>
                    <a href="{!! route('background.members.edit', [$member->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-edit">编辑</i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">删除</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定要删除?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
