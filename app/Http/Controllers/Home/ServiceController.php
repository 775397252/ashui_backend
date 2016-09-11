<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller as LaravelController;
use App\Models\Background\AshuiConfession;
use App\Models\Home\AshuiConfessionsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends LaravelController
{

    //打印
    public function upprint(Request $request)
    {
        return view('home.service.upprint');
    }

    public function printprice(Request $request)
    {
        $number=$request->input('number');
        $file = $request->file('file');
        if(!$request->hasFile('file')){
            return redirect('/ashui/service/upprint')->withErrors('请选择文件');
        }
        if($file->getClientSize()>1024*1024*10){
            return redirect('/ashui/service/upprint')->withErrors('请选择小于10M的文件');
        };

        if ($file->isValid()) {
            $filename=time().$file->getClientOriginalName();
            $path = $file->move(app_path('uploads'),$filename);
            DB::table('print_file')->insert([
                'user_id'=>session('member_id'),
                'number'=>$number,
                'file'=>app_path('uploads').'\\'.$filename,
            ]);
            $money=$number*0.1+0.5;
            return view('home.service.printprice')->withMoney($money);
        }
        return redirect('/ashui/service/upprint');
    }

    public function ashui_book(){
        return view('home.service.ashui_book');
    }



}
