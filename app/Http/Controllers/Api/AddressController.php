<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;

class AddressController extends BaseController
{
    //
    public function createAddress(Request $request)
    {
        $data = $request->input();
        $validate = Validator::make($data, [
            "name" => "required",
            "tel" => "required",
            "user_id" => "required",
            "provence" => "required",
            "city" => "required",
            "area" => "required",
            "detail_address" => "required",
        ]);
        if ($validate->fails()) {
            //返回错误
            return [
                'status' => "false",
                //获取错误信息
                "message" => $validate->errors()->first()
            ];
        }
        Address::create($data);
        return [
            'status' => "true",
            "message" => "添加成功"
        ];
    }
    public function list(Request $request)
    {
        $id = $request->get("user_id");
        $addresses = Address::where("user_id",$id)->get();
        return $addresses;

    }

    public function back(Request $request)
    {
        $id = $request->input("id");
        $address = Address::where("id",$id)->first();
        return $address;
    }

    public function edit(Request $request)
    {
        $id = $request->input("id");
        $data = $request->input();
        $address = Address::findOrFail($id);
        $address->update($data);
        return [
            'status' => 'ture',
            'message' => '修改成功'
        ];
    }
}
