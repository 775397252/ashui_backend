<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller as LaravelController;
use App\Models\Background\Biaobai;
use App\Models\Background\Member;
use App\Models\Background\AshuiPlace;
use App\Models\Home\AshuiBiaobaisComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Home\AshuiMessageBoard;

/***
 * Class MeetController
 * @package App\Http\Controllers\Home
 * 阿随相遇
 */
class MyController extends LaravelController
{
    //我的关注
    public  function attend()
    {
        $attend=DB::table('ashui_attend')
            ->where('user_id',session('member_id'))
            ->leftJoin('members', 'members.id', '=', 'ashui_attend.attend_user_id')
            ->get();
        return view('home.my.attend')->withAttend($attend)->withLight(6);
    }

    //资料修个
    public function updateInfo(Request $request){
        $user_id=session('member_id');
        if($request->isMethod('post')){
            $data=$request->all();
            if($data['password']){
                $ok=DB::table('members')->where('id',$user_id)->update([
                    'username'=>$data['username'],
                    'school'=>$data['school'],
                    'is_love'=>$data['is_love'],
                    'address'=>$data['address'],
                    'password'=>$data['password'],
                    'created_at'=>Carbon::now(),
                ]);
            }else{
                $ok=DB::table('members')->where('id',$user_id)->update([
                    'username'=>$data['username'],
                    'school'=>$data['school'],
                    'is_love'=>$data['is_love'],
                    'address'=>$data['address'],
                    'created_at'=>Carbon::now(),
                ]);
            }
            $usrtinfo=Member::where('id',$user_id)->first();
            return view('home.my.updateinfo')->withInfo($usrtinfo)->withOk(1)->withLight(6);
            die;
        }
        $usrtinfo=Member::where('id',$user_id)->first();
        return view('home.my.updateinfo')->withInfo($usrtinfo)->withLight(6);
    }

    //主页
    public function index(Request $request)
    {
        $user_id=session('member_id');
        $query=AshuiPlace::orderBy('id', 'desc')->with('comments')->with('users');
        $share=$query->where('user_id',$user_id)->paginate(2);
        return view('home.my.index')->withShare($share)->withLight(6);
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

    //留言板
    public function MessageBoard(Request $request,$id){
        if($request->isMethod('post')){
            $data=$request->all();
            DB::table('ashui_message_board')->insert([
                'user_id'=>$data['user_id'],
                'to_user_id'=>$data['to_user_id'],
                'comment'=>$data['comment'],
                'created_at'=>Carbon::now(),
            ]);
        }
        //判断是否关注
        $iid=DB::table('ashui_attend')->where('user_id',session('member_id'))->where('attend_user_id',$id)->first();
        $attend=0;
        if($iid){
            $attend=1;
        }
        $message=AshuiMessageBoard::where('to_user_id',$id)->paginate(10);
        return view('home.my.messageboard')->withLight(6)->withShare($message)->withId($id)->withAttend($attend);
    }


}
