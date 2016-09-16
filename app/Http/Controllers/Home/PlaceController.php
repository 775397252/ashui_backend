<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller as LaravelController;
use App\Models\Background\AshuiPlace;
use App\Models\Home\AshuiPlaceComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/***
 * Class MeetController
 * @package App\Http\Controllers\Home
 * 阿水广场
 */
class PlaceController extends LaravelController
{
    //来一发
    public function yifa(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $ok=DB::table('ashui_place')->insert([
                'title'=>$data['title'],
                'type'=>$data['type'],
                'content'=>$data['content'],
                'user_id'=>$data['user_id'],
                'created_at'=>Carbon::now(),
            ]);
            if($ok){
                return response()->json(['state' => 1, 'msg' => '成功！']);
            }
            return response()->json(['state' => 0, 'msg' => '失败！']);
        }
        return view('home.place.yifa');
    }
    //阿水广场
    public function index(Request $request)
    {
        $query=AshuiPlace::orderBy('id', 'desc')->with('comments')->with('users');
        $share=$query->where('type','<>',2)->orWhere(function ($query) {
            $query->where('user_id',  session("member_id"));
        })
            ->paginate(2);
        return view('home.place.index')->withShare($share);
    }

    //阿水评论
    public function comment(AshuiPlaceComment $ashuiConfessionComment,Request $request){
        $ashuiConfessionComment->place_id = $request->place_id;
        $ashuiConfessionComment->user_id = $request->user_id;
        $ashuiConfessionComment->comment = $request->comment;
        $ashuiConfessionComment->username = session("member_name");
        $ashuiConfessionComment->save();
        return response()->json(['state' => 1, 'msg' => '评论成功！']);
    }

    //阿水good
    public function click(AshuiPlace $ashuiConfession,Request $request){
        $ids=$request->input('place_id');
        $has= DB::table('ashui_place_click')->where('user_id',$request->user_id)->where('place_id',$ids)->first();
        if($has) return response()->json(['state' => 0, 'msg' => '你已经点过了！']);
        $ashuiConfession->where('id',$ids)->increment('click');
        DB::table('ashui_place_click')->insert([
            'place_id'=>$ids,
            'user_id'=>$request->user_id,
        ]);
        return response()->json(['state' => 1, 'msg' => '成功！']);
    }

}
