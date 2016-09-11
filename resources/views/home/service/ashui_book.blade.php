@extends('layouts.home_app_core')
@section('content')
    <div class="col-xs-3" class="pull-left" style="margin-top: 100px;width: 100px;z-index: 100;position: fixed">
        <ul class="nav nav-tabs nav-stacked" >
            <li ><a href="#section-1">打印</a></li>
            <li><a href="#section-2">书籍</a></li>
            <li><a href="#section-2">社区</a></li>
        </ul>
    </div>

    <!--<div class="pull-right"  style="width:20px;color: #2aabd2;">-->
    <!--<h2>我是竖列排版</h2>-->
    <!--</div>-->
    <div class="clearfix"></div>
    <div class="container">
        <div class="starter-template">
            <div class="jumbotron" style="width: 80%;margin-left: 100px;margin-right: 100px;">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="img-circle" src="images/book.jpg" alt="没有图片。。。" width="140" height="140">
                        <h4>墨菲定律</h4>
                        <p class="text-danger">价格:300元</p>
                        <p><a class="btn btn-default" href="#" role="button">立即购买</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img class="img-circle" src="images/book.jpg" alt="没有图片。。。" width="140" height="140">
                        <h4>墨菲定律</h4>
                        <p class="text-danger">价格:300元</p>
                        <p><a class="btn btn-default" href="#" role="button">立即购买</a></p>
                    </div><!-- /.col-lg-4 -->
                </div>
                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div><!-- /.container -->
@endsection
