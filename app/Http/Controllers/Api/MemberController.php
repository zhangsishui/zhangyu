<?php

namespace App\Http\Controllers\Api;


use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Mrgoon\AliSms\AliSms;

class MemberController extends BaseController
{
    //
    public function reg(Request $request)
    {
        $data = $request->all();
        $validate = Validator::make($data, [
            "username" => "required|unique:members",
            "password" => "required",
            "sms" => "required|integer|min:1000|max:9999",
            "tel" => [
                'required',
                'regex:/^0?(13|14|15|17|18|19)[0-9]{9}$/',
                'unique:members',
            ]
        ]);
        if ($validate->fails()) {
            //返回错误
            return [
                'status' => "false",
                //获取错误信息
                "message" => $validate->errors()->first()
            ];
        }
        $code = Redis::get("tel_" . $data['tel']);
        if ($code != $data['sms']) {
            //返回错误
            return [
                'status' => "false",
                //获取错误信息
                "message" => "验证码错误"
            ];
        }
        $data['password'] = bcrypt($data['password']);
        //数据入库
        Member::create($data);
        //返回数据
        return [
            'status' => "true",
            "message" => "添加成功"
        ];
    }

    public function sms()
    {
        $tel = \request()->input("tel");
        $code = rand(1000, 9999);
        Redis::setex("tel_" . $tel, 300, $code);
        return [
            "status" => "true",
            "message" => "获取短信验证码成功",
            "code" => $code,
        ];
        /*        $config = [
                    'access_key' => 'LTAIezSoVAhgeTEz',
                    'access_secret' => 'zN11X4TLlhAMDSvWLhZA8EVtPHi0mK',
                    'sign_name' => '张雨',
                ];*/
        /*        $aliSms = new AliSms();
                $response = $aliSms->sendSms($tel, 'SMS_140665165', ['code' => $code], $config);
                if ($response->Message === "OK") {
                    //成功
                    return [
                        "status" => "true",
                        "message" => "获取短信验证码成功"
                    ];
                } else {
                    //失败
                    return [
                        "status" => "false",
                        "message" => $response->Message
                    ];
                }*/
    }

    public function loginCheck(Request $request)
    {
        $data = $request->all();
        $member = Member::where("username", "{$data['name']}")->first();
        if ($member && Hash::check($request->post('password'), $member->password)) {
            return [
                'status' => 'true',
                'message' => '登录成功',
                'user_id' => $member->id,
                'username' => $member->username
            ];
        } else {
            return [
                'status' => 'false',
                'message' => '账号或密码错误'
            ];
        }


    }

    public function changePassword(Request $request)
    {
        $data = $request->all();
        $member = Member::find($data['id']);
        if ($member && Hash::check($data['oldPassword'], $member->password)) {
            $data['password'] = Hash::make($data['newPassword']);
            $member->update($data);

            return [
                'status'=>"true",
                'message'=>"修改密码成功"
            ];
        }else{
            return [
                'status' => "false",
                //获取错误信息
                "message" => "旧密码错误"
            ];
        }

    }

    public function forgetPassword(Request $request)
    {
        $data=$request->all();
        $member=Member::where('tel',"{$data['tel']}")->first();
        if (!$member){
            return [
                'status' => "false",
                //获取错误信息
                "message" => "不存在此用户手机"
            ];
        }
        //验证验证码是否一致
        $code = Redis::get("tel_" . $data['tel']);
        if ($code != $data['sms']) {
            //返回错误
            return [
                'status' => "false",
                //获取错误信息
                "message" => "验证码错误"
            ];
        }
        $data['password']=bcrypt($data['password']);
        $member->update($data);
        return [
            'status'=>"true",
            'message'=>"重置密码成功"
        ];

    }
    //用户详情
    public function detail()
    {
        $userId = \request()->input("user_id");
        $member = Member::find($userId);
        return $member;
    }
}
