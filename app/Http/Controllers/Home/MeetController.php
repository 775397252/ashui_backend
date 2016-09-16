<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller as LaravelController;
use App\Models\Background\Biaobai;
use App\Models\Home\AshuiBiaobaisComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/***
 * Class MeetController
 * @package App\Http\Controllers\Home
 * 阿随相遇
 */
class MeetController extends LaravelController
{
    //表白强
    public function wall(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $ok=DB::table('biaobais')->insert([
                'title'=>$data['title'],
                'content'=>$data['content'],
                'user_id'=>$data['user_id'],
                'created_at'=>Carbon::now(),
            ]);
            if($ok){
                return response()->json(['state' => 1, 'msg' => '成功！']);
            }
            return response()->json(['state' => 0, 'msg' => '失败！']);
        }
        return view('home.meet.wall');
    }
    public function dove(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $ok=DB::table('dove')->insert([
                'content'=>$data['content'],
                'user_id'=>$data['user_id'],
                'to_user_id'=>$data['to_user_id'],
                'created_at'=>Carbon::now(),
            ]);
            if($ok){
                return response()->json(['state' => 1, 'msg' => '成功！']);
            }
            return response()->json(['state' => 0, 'msg' => '失败！']);
        }
        //获取我的表白信息
        $has= DB::table('dove')->where('to_user_id',session("member_id"))->get();
        //获取互相喜欢的信息
        $has_me= DB::table('dove')->where('user_id',session("member_id"))->get();
        $say=[];
        foreach($has_me as $k=>$v){
            $has_other=DB::table('dove')
                ->leftJoin('members', 'members.id', '=', 'dove.user_id')
                ->where('user_id',$v->to_user_id)
                ->where('to_user_id',session("member_id"))
                ->first();
            if($has_other){
                $say[]=$has_other;
            }
        }
        return view('home.meet.dove')->withHas($has)->withSay($say);
    }

    //阿水表达
    public function index(Request $request)
    {
        $query=Biaobai::orderBy('id', 'desc')->with('comments')->with('users');
        $share=$query->paginate(2);
        return view('home.meet.index')->withShare($share);
    }

    //阿水评论
    public function comment(AshuiBiaobaisComment $ashuiConfessionComment,Request $request){
        $ashuiConfessionComment->biaobais_id = $request->confessions_id;
        $ashuiConfessionComment->user_id = $request->user_id;
        $ashuiConfessionComment->comment = $request->comment;
        $ashuiConfessionComment->username = session("member_name");
        $ashuiConfessionComment->save();
        return response()->json(['state' => 1, 'msg' => '评论成功！']);
    }

    //阿水good
    public function click(Biaobai $ashuiConfession,Request $request){
        $ids=$request->input('confessions_id');
        $has= DB::table('ashui_biaobais_click')->where('user_id',$request->user_id)->where('biaobais_id',$ids)->first();
        if($has) return response()->json(['state' => 0, 'msg' => '你已经点过了！']);
        $ashuiConfession->where('id',$ids)->increment('click');
        DB::table('ashui_biaobais_click')->insert([
            'biaobais_id'=>$ids,
            'user_id'=>$request->user_id,
        ]);
        return response()->json(['state' => 1, 'msg' => '成功！']);
    }

}
