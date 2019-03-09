<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Employer;
use App\Code;
use App\Rules\Password;

class ResetPasswordController extends Controller
{
    //
    public function index()
    {
    	return view('reset_password.index');
    }

    protected $messages = [
        'required' => ":attribute は必須項目です。",
        'new_password_confirmation.same' => ':attribute はパスワードと一致していません。',
        'email' => ":attribute がメールアドレスと一致していません。",
        
    ];

    protected $attributes = [
        'new_password' => '新しいパスワード',
        'new_password_confirmation' => '新しいパスワード(確認)',
        'email' => 'メールアドレス',
    ];

    public function sendMail(Request $request)
    {
    	$email = trim($request->email);

    	$validator = Validator::make($request->all(), [
    		"email" => ["required","email"]
    	]);

        if($validator->fails()) 
        {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $employer = Employer::where("email",$email)->where('active',1)->first();
        if(!isset($employer) || empty($employer))
        {
            $validator->getMessageBag()->add('email', '存在しないメールアドレスが指定されました。');
            return redirect()->back()->with('errors', $validator->errors());
        }

    	$reset_token = Code::generateRandomString(48);
    	$employer->reset_token = $reset_token;
    	$employer->save();
  
    	Code::send_password_reset_email($employer->id,$employer->email,$reset_token);

    	return redirect()->back()->with('success','パスワードリセットメールが送信されました。');
    }

    public function resetPassword($id, $reset_token)
    {
        if(empty($id) || empty($reset_token))
        {
            abort(404);
        }

        $employee = Employer::findOrfail($id);
        $hc_check = hash("md5", $employee->reset_token);

        if($reset_token !== $hc_check)
        {
            abort(404);
        }


        $id_slug = Code::generateRandomString(20);
        $h_id = hash("md5", $id.$id_slug);
        $full_id = $h_id.hash("md5",$reset_token);

    	return view('reset_password.password_change', [
            "id" => $id,
    		"id_slug" => $id_slug,
            "full_id" => $full_id
    	]);
    }

    public function passwordChange(Request $request)
    {
        $employer_id = $request->employer_id;
        $id_slug = $request->id_slug;
        $full_id = $request->full_id;

        $h_id = hash("md5", $employer_id.$id_slug);

        $employee = Employer::findOrfail($employer_id);
        $reset_token = hash("md5", $employee->reset_token);

        $check_full_id = $h_id.hash("md5", $reset_token);

        if($check_full_id != $full_id) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'new_password' => ['required',new Password],
            'new_password_confirmation' => ['required','same:new_password']
        ],$this->messages,$this->attributes);

        if($validator->fails()) 
        {
            return redirect()->back()->with('errors', $validator->errors());
        }

        Employer::find($employer_id)->update(['password' => bcrypt($request->new_password)]);

        Employer::where("id", $employer_id)
        ->update([
            "reset_token" => null
        ]);

        \Auth::loginUsingId($employer_id);

        return redirect()->route("home")->with('success','パスワードが正常に変更されました。');
    }

}
