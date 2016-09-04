<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Session;
use Validator;
class UserController extends Controller
{
    //用户列表
    public function Login()
    {
        return view('home.user.login');
    }
    public function Register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'url' => 'required|max:255',
                'permission_id' => 'required',
                'id'=>'required'
            ]);
            if ($validator->fails()) {
                return view('home.user.register')->withErrors($validator);
            }
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
}
