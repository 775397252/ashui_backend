<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Background\Member;
use App\Models\Home\AshuiMessageBoard;
use Carbon\Carbon;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Models\Background\AshuiPlace;

use Session;
use Validator;
use DB;
class UserController extends Controller
{
    //用户列表
    public function Login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
            'password' => 'required',
            'captcha' => 'required|max:255',
        ],[
            'required' => ':attribute 必须填写。',
        ])->after(function($validator)use($request) {
            if (Session::get('captcha')!= $request->get('captcha')) {
                $validator->errors()->add('field', '验证码错误!');
            }
            $userinfo=Member::where('email',$request->get('phone'))->first();
            if(!$userinfo){
                $validator->errors()->add('field', '用户不存在!');
            }else if($request->get('password')!=$userinfo->password){
                $validator->errors()->add('field', '账号或者错误!');
            }

        });
        if ($validator->fails()) {
            return redirect('login')
                
                    ->withErrors($validator)
                    ->withInput();
        }
        $userinfo=Member::where('email',$request->get('phone'))->first();
        session(['member_id' =>$userinfo->id,'member_phone'=>$request->get('phone'),'member_name'=>$userinfo->username]);
        return redirect('ashui/top');
    }
        return view('home.user.login')
            ->withLoginActive('active');
    }
    public function Register(Request $request)
    {
        if ($request->isMethod('post')) {
//            dd($request->all());
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:members',
                'username' => 'required|max:20',
                'password' => 'required|confirmed',
                'captcha' => 'required|max:255',
            ],[
                'required' => ':attribute 没有填写。',
                'confirmed' => '密码和确认密码不相同。',
                'email' => '必须为邮箱格式。',
                'max' => '用户名长度最多20个字符。',
                'unique' => ' :attribute 已经存在。',
            ])->after(function($validator)use($request) {
                if (Session::get('captcha')!= $request->get('captcha')) {
                    $validator->errors()->add('field', '验证码错误!');
                }
            });
            if ($validator->fails()) {
                return redirect('register')
                    ->withErrors($validator)
                    ->withInput();
            }
           // dd($request->all());
            $info=Member::create($request->all());
            //新添加直接登录
            $userinfo=Member::where('email',$request->get('email'))->first();
            session(['member_id' =>$userinfo->id,'member_name'=>$userinfo->username]);
            return redirect('ashui/top');
            //if($info) return redirect('login');
        }
        return view('home.user.register')
            ->withRegisterActive('active');
    }
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 200, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('captcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    public function logout(Request $request){
        $value = session('member_phone');
        $request->session()->forget('member_id');
        $request->session()->forget('member_phone');
        $request->session()->forget('member_name');
        return redirect('/login');
    }
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
        $message=AshuiMessageBoard::where('to_user_id',$id)->with('users')->orderBy('id', 'desc')->paginate(10);
     // dd($message);
       return view('home.user.messageboard')->withShare($message)->withId($id)->withAttend($attend)->withLight(0);
    }
    public function attend(Request $request){
            $data=$request->all();
            $ok=DB::table('ashui_attend')->insert([
                'user_id'=>$data['user_id'],
                'attend_user_id'=>$data['attend_user_id'],
                'created_at'=>Carbon::now(),
            ]);
            if($ok){
                return response()->json(['state' => 1, 'msg' => '成功！']);
            }
        return response()->json(['state' => 0, 'msg' => '失败！']);

    }
    //主页
    public function main($id)
    {
        $query=AshuiPlace::orderBy('id', 'desc')->with('comments')->with('users');
        $share=$query->where('user_id',$id)->paginate(2);
        return view('home.user.main')->withShare($share)->withId($id)->withLight(0);
    }
}
