<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Background\Member;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Session;
use Validator;
class UserController extends Controller
{
    //用户列表
    public function Login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric',
            'password' => 'required',
            'captcha' => 'required|max:255',
        ],[
            'required' => ':attribute 必须填写。',
            'numeric' => ' :attribute 必须为电话号码格式',
        ])->after(function($validator)use($request) {
            if (Session::get('captcha')!= $request->get('captcha')) {
                $validator->errors()->add('field', '验证码错误!');
            }
            $userinfo=Member::where('phone',$request->get('phone'))->first();
            if(!$userinfo){
                $validator->errors()->add('field', '用户不存在!');
            }else if($request->get('password')!=$userinfo->password){
                $validator->errors()->add('field', '账号或者错误!');
            }

        });
        if ($validator->fails()) {
            return view('home.user.login')->withErrors($validator);
        }
        $userinfo=Member::where('phone',$request->get('phone'))->first();
        session(['member_id' =>$userinfo->id,'member_phone'=>$request->get('phone'),'member_name'=>$userinfo->username]);
        return redirect('/');
    }
        return view('home.user.login');
    }
    public function Register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'phone' => 'required|numeric|unique:members',
                'email' => 'required|email|unique:members',
                'username' => 'required',
                'password' => 'required|confirmed',
                'captcha' => 'required|max:255',
            ],[
                'required' => ':attribute 必须填写。',
                'confirmed' => '密码和确认密码不相同。',
                'email' => '必须为邮箱格式。',
                'numeric' => ' :attribute 必须为电话号码格式',
                'unique' => ' :attribute 已经存在。',
            ])->after(function($validator)use($request) {
                if (Session::get('captcha')!= $request->get('captcha')) {
                    $validator->errors()->add('field', '验证码错误!');
                }
            });
            if ($validator->fails()) {
                return view('home.user.register')->withErrors($validator);
            }
           // dd($request->all());
            $info=Member::create($request->all());
            if($info) return redirect('login');
        }
        return view('home.user.register');
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
}
