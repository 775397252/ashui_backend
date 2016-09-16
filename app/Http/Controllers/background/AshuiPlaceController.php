<?php

namespace App\Http\Controllers\Background;

use App\Http\Requests\Background;
use App\Http\Controllers\Controller as LaravelController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;
class AshuiPlaceController extends LaravelController
{

    public function index(Request $request)
    {
        $list=DB::table('ashui_place')
            ->select('ashui_place.*', 'members.username')
            ->leftJoin('members', 'members.id', '=', 'ashui_place.user_id')
            ->orderBy('ashui_place.id', 'desc')
            ->paginate(20);
        return view('background.place.index')->withList($list);
    }

    public function delete($id)
    {
        DB::table('ashui_place')->where('id', $id)->delete();
        return redirect('background/ashuiPlace');
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
