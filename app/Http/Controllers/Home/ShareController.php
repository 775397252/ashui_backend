<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller as LaravelController;
use App\Models\Background\AshuiConfession;
use App\Models\Home\AshuiConfessionsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShareController extends LaravelController
{

    //阿水分享
    public function index(Request $request)
    {
        $type=$request->input('type');
        $query=AshuiConfession::orderBy('id', 'desc')->with('comments');
        if(!is_null($type)) $query->where('type',$type);
        $share=$query->paginate(2);
        return view('home.share.index')->withShare($share)->withLight(4);
    }

    //阿水分享评论
    public function comment(AshuiConfessionsComment $ashuiConfessionComment,Request $request){
        $ashuiConfessionComment->confessions_id = $request->confessions_id;
        $ashuiConfessionComment->user_id = $request->user_id;
        $ashuiConfessionComment->comment = $request->comment;
        $ashuiConfessionComment->username = session("member_name");
        $ashuiConfessionComment->save();
        return response()->json(['state' => 1, 'msg' => '评论成功！']);
    }

    //阿水good
    public function click(AshuiConfession $ashuiConfession,Request $request){
        $ids=$request->input('confessions_id');
        $has= DB::table('ashui_confessions_click')->where('user_id',$request->user_id)->where('confessions_id',$ids)->first();
        if($has) return response()->json(['state' => 0, 'msg' => '你已经点过了！']);
        $ashuiConfession->where('id',$ids)->increment('click');
        DB::table('ashui_confessions_click')->insert([
            'confessions_id'=>$ids,
            'user_id'=>$request->user_id,
        ]);
        return response()->json(['state' => 1, 'msg' => '成功！']);
    }

}
