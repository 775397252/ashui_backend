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
                return redirect("ashui/place");
            }
        }
        return view('home.place.yifa')
            ->withTitle("阿水广场，世界在这里绽放")
            ->withLight(2);
    }
    //阿水广场
    public function index(Request $request)
    {
        $query=AshuiPlace::orderBy('id', 'desc')->with('comments')->with('users');
        $share=$query->where('type','<>',2)->orWhere(function ($query) {
            $query->where('user_id',  session("member_id"));
        })->paginate(5);
        return view('home.place.index')
            ->withShare($share)
            ->withTitle("阿水广场，世界在这里绽放")
            ->withLight(2);
    }

    //阿水评论
    public function comment(AshuiPlaceComment $ashuiConfessionComment,Request $request){
        $ashuiConfessionComment->place_id = $request->place_id;
        $ashuiConfessionComment->user_id = $request->user_id;
        $ashuiConfessionComment->comment = $request->comment;
        $ashuiConfessionComment->username = session("member_name");
        $ashuiConfessionComment->save();
        AshuiPlace::where('id',$request->place_id)->increment('weight',6);
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
        AshuiPlace::where('id',$ids)->increment('weight',4);
        return response()->json(['state' => 1, 'msg' => '成功！']);
    }

    //阿水头条
    public function top(){
        $y = date("Y");
        $m = date("m");
        $d = date("d");
        $todayTime= mktime(0,0,1,$m,$d,$y);
        $query=AshuiPlace::orderBy('weight', 'desc')->with('comments')->with('users');
        $share=$query->where('type','<>',2)->where('created_at', '>', date("Y-m-d H:i;s",$todayTime))->limit(10)->get();
        return view('home.place.top')
            ->withShare($share)
            ->withTitle("阿水头条，今天你是头条吗")
            ->withLight(1);
    }

    //特别关注
    public function especially(){
        //获取我关注列表
        $attend=DB::table('ashui_attend')->where('user_id',session('member_id'))->get();
        $peopel=[];
        if($attend){
            foreach($attend as $v){
                $peopel[]=$v->attend_user_id;
            }
        }
        $query=AshuiPlace::orderBy('id', 'desc')->with('comments')->with('users');
        $share=$query->where('type','<>',2)->whereIn('user_id',$peopel)->paginate(5);
        //dd($share);

        return view('home.place.index')
            ->withTitle("阿水广场，世界在这里绽放")
            ->withShare($share)->withLight(2);
    }

    public function detail($id){
        $query=AshuiPlace::where('id',$id)->first();
        return view('home.place.detail')
            ->withV($query)
            ->with('comments')
            ->with('users')
            ->withTitle("阿水广场，世界在这里绽放")
            ->withLight(2);
    }
    public function top_detail($id){
        $query=AshuiPlace::where('id',$id)->first();
        return view('home.place.top_detail')
            ->withV($query)
            ->with('comments')
            ->with('users')
            ->withTitle("阿水头条，今天你是头条吗")
            ->withLight(1);
    }
}
