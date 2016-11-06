<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller as LaravelController;
use Illuminate\Http\Request;
use Mail;

class MailController extends LaravelController
{
    /***
     * @param $to发送给谁
     * @param $uid 激活用户id
     */
    public function send($to,$uid,$content)
    {
        $flag = Mail::send('emails.test',['name'=>$content,'uid'=>$uid],function($message){
            $to = '775397252@qq.com';
            $message ->to($to)->subject('测试邮件');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }

}
