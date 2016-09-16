<?php

namespace App\Http\Controllers\Background;

use App\Http\Requests\Background;
use App\Http\Controllers\Controller as LaravelController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;
class AshuiServiceController extends LaravelController
{

    public function printlist(Request $request)
    {
        $list=DB::table('print_file')
            ->select('print_file.*', 'members.username')
            ->leftJoin('members', 'members.id', '=', 'print_file.user_id')
            ->orderBy('print_file.id', 'desc')
            ->paginate(20);
//        Flash::success('Member deleted? successfully.');
        return view('background.service.printlist')->withList($list);
    }

    public function deleteprint($id)
    {
        DB::table('print_file')->where('id', $id)->delete();
        return redirect('background/ashuiServiceprint');
    }



    public function booklist(){
        $list=DB::table('ashui_book')->orderBy('ashui_book.id', 'desc')->paginate(20);
        return view('background.service.booklist')->withList($list);
    }

    public function addbook(){
        return view('background.service.addbook');
    }
    public function storebook(Request $request){
        $date=$request->all();
        $file = $request->file('file');
        //文件上传
        $filename='';
        if ($file->isValid()) {
            //$filename=time().$file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $filename=time().'.' . $ext;
            $file->move(public_path('uploads'),$filename);
        }
        DB::table('ashui_book')->insert([
            'bookname'=>$date['bookname'],
            'price'=>$date['price'],
            'content'=>$date['content'],
            'file'=>'/uploads/'.$filename,
            'created_at'=>Carbon::now()
        ]);
        return redirect('background/ashuiServicebook');
    }
    public function deletebook($id){
        DB::table('ashui_book')->delete($id);
        return redirect('background/ashuiServicebook');
    }


}
