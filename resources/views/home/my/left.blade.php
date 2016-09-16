<div class="col-xs-3" class="pull-left" style="margin-top: 100px;width: 100px;z-index: 100;position: fixed">
                <ul class="nav nav-tabs nav-stacked" >
                        <li ><a href="{{url('my/index')}}">主页</a></li>
                        <li ><a href="{{url('my/messageboard',[session('member_id')])}}">留言板</a></li>
                        <li ><a href="{{url('my/attend')}}">我的关注</a></li>
                        <li ><a href="{{url('my/updateinfo')}}">资料修改</a></li>
                </ul>
</div>
