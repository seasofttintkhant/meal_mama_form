<?php

namespace App\Http\Controllers;

use App\Employer;
use Illuminate\Http\Request;
use Validator;
use App\Rules\Phone;
use App\Rules\CurrentPassword;
use App\Rules\Password;
use App\Rules\Katakana;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $messages = [

        "email" => [
            'required' => ":attribute は必須項目です。",
            'new_email.unique' => ":attribute 同一のメールアドレスが既に登録されています。",
            'new_password_confirmation.same' => ':attribute はパスワードと一致していません。',
            'new_email.email' => ":attribute がメールアドレスと一致していません。",
        ],

        "profile_edit" => [
            'required' => ":attribute は必須項目です。",
            'c_password.same' => ':attribute はパスワードと一致していません。',
            'name_kana.regex' => '全角カタカナを入力してください。',
            'in_charge_last_name_kana.regex' => '全角カタカナ(セイ)を入力してください。',
            'in_charge_first_name_kana.regex' => '全角カタカナ(メイ)を入力してください。',
        ]
        
    ];

    protected $attributes = [

        "email" => [
            'current_password' => '現在のパスワード',
            'new_password' => '新しいパスワード',
            'new_password_confirmation' => '新しいパスワード(確認)',
            'new_email' => '新しいメールアドレス',
        ],

        "profile_edit" => [
            'in_charge_last_name' => '担当者氏名(姓)',
            'in_charge_first_name' => '担当者氏名(名)',
            'in_charge_last_name_kana' => '担当者氏名(フリガナ)(姓)',
            'in_charge_first_name_kana' => '担当者氏名(フリガナ)(名)',
            'phonenumber' => '電話番号',
            'zip_code' => '郵便番号 ',
            'prefecture_id' => '都道府県',
            'city_id' => '市区町村',
            'street_address' => '町名・番地',
            'building' => '建物名',
            'fax' => 'FAX番号',
            'billing_in_charge_post' => '担当者所属部署名',
            'billing_in_charge_position' => '担当者役職名',
            'billing_in_charge_last_name' => '担当者氏名(姓)',
            'billing_in_charge_first_name' => '担当者氏名(名)',
            'billing_in_charge_last_name_kana' => '担当者氏名(フリガナ)(姓)',
            'billing_in_charge_first_name_kana' => '担当者氏名(フリガナ)(名)',
            'billing_phonenumber' => '電話番号',
            'billing_zip_code' => '郵便番号 ',
            'billing_prefecture_id' => '都道府県',
            'billing_city_id' => '市区町村',
            'billing_street_address' => '町名・番地',
            'billing_building' => '建物名',
            'billing_fax' => 'FAX番号',
            'billing_in_charge_post' => '担当者所属部署名',
            'billing_in_charge_position' => '担当者役職名',
        ]

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $employer = Employer::orderBy('id','desc')->paginate(10);
        return view('mode_switch.email_edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         request()->validate([
            'email' => 'required|unique',
        ]);
        $data=[
            'email'=> strip_tags(trim($request->email)) ,
            ];
        $employer = new Employer;
        $employer->fill($data);
        //return $features;
        $employer->save();
        return redirect()->route('mode_switch.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employer=Employer::findOrFail($id);
        return view('mode_switch.email_edit',[
            'employer' => $employer
        ]);
    }

    public function editPassword() {
        return view("mode_switch.password");
    }
    public function updatePassword(Request $request) {

            $old_password = auth()->user()->password;

            $validator = Validator::make($request->all(), [
                'current_password' => ['required', new CurrentPassword],
                'new_password' => ['required',new Password],
                'new_password_confirmation' => ['required','same:new_password']
            ],$this->messages,$this->attributes);

            if($validator->fails()) 
            {
                return redirect()->back()->with('errors', $validator->errors());
            }

            Employer::find(auth()->user()->id)->update(['password' => bcrypt($request->new_password)]);

            return redirect()->back()->with('success','パスワードが正常に変更されました。');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
         $employer=Employer::findOrFail($id);
            $rules = [
             'email' => 'required|unique:employers',
            ];
           $data=[
            'email'=> strip_tags(trim($request->email))
            ];
            // return $data;

                $employer->update($data);

                //return $employer;

            return redirect()->route('mode_switch.index');

    }

    public function emailIndex()
    {
        return view('mode_switch.email_edit');
    }

    public function emailUpdate(Request $request) {

            $request->email = strip_tags(trim($request->email));

            $validator = Validator::make($request->all(), [
                'email' => ['required','email','max:128','unique:employers,email']
            ],$this->messages["email"],$this->attributes["email"]);

            if($validator->fails()) 
            {
                return redirect()->back()->with('errors', $validator->errors());
            }

            Employer::where("id",auth()->user()->id)->update(["email" => $request->email]);

            return redirect()->back()->with('success','メールアドレスが正常に変更されました。');
            
    }

    public function profileEdit() {
        $current_employer = auth()->user();
        return view("mode_switch.edit", [
            "current_employer" => $current_employer,
        ]);
    }

    public function profileUpdate(Request $request) {
        $rules =[
            'in_charge_last_name' =>  ['required','string','max:128'],
            'in_charge_first_name' =>  ['nullable','string','max:128'],
            'in_charge_last_name_kana' => ['nullable','string','max:128',new Katakana],
            'in_charge_first_name_kana' => ['nullable','string','max:128',new Katakana],
            'in_charge_post' => ['nullable', 'string', 'max:128'],
            'in_charge_position' => ['nullable', 'string', 'max:128'],
            'phonenumber' => ['required',new Phone],
            'zip_code' => 'required',
            'prefecture_id' => 'required',
            'city_id' => 'required',
            'street_address'=> 'required',
            'building' => ['nullable', 'string'],
            'fax' => ['nullable',new Phone]
        ];

        if($request->billing)
        {
            $billing_rules =[
                'billing_in_charge_last_name' =>  ['required','string','max:128'],
                'billing_in_charge_first_name' =>  ['nullable','string','max:128'],
                'billing_in_charge_last_name_kana' => ['nullable','string','max:128',new Katakana],
                'billing_in_charge_first_name_kana' => ['nullable','string','max:128',new Katakana],
                'billing_in_charge_post' => ['nullable', 'string', 'max:128'],
                'billing_in_charge_position' => ['nullable', 'string', 'max:128'],
                'billing_phonenumber' => ['required',new Phone],
                'billing_zip_code' => 'required',
                'billing_prefecture_id' => 'required',
                'billing_city_id' => 'required',
                'billing_street_address'=> 'required',
                'billing_building' => ['nullable', 'string'],
                'billing_fax' => ['nullable',new Phone]
            ];

            $rules = array_merge($rules,$billing_rules);
        }
        $validator = Validator::make($request->all(), $rules ,$this->messages["profile_edit"],$this->attributes["profile_edit"]);

        if ($validator->fails()) {
            return response()->json(['errors'=> $validator->errors()],422);
        }

        Employer::where("id",auth()->user()->id)
        ->update([
            'in_charge_last_name' => strip_tags(trim($request->in_charge_last_name)),
            'in_charge_first_name' => strip_tags(trim($request->in_charge_first_name)),
            'in_charge_last_name_kana' => strip_tags(trim($request->in_charge_last_name_kana)),
            'in_charge_first_name_kana' => strip_tags(trim($request->in_charge_first_name_kana)),
            'in_charge_post' => strip_tags(trim($request->in_charge_post)),
            'in_charge_position' => strip_tags(trim($request->in_charge_position)),
            'phonenumber' => strip_tags(trim($request->phonenumber)),
            'zip_code' => strip_tags(trim($request->zip_code)),
            'prefecture_id' =>$request->prefecture_id,
            'city_id' => $request->city_id,
            'street_address'=> strip_tags(trim($request->street_address)),
            'building' => strip_tags(trim($request->building)),
            'fax' => strip_tags(trim($request->fax)),
            'billing_in_charge_last_name' => strip_tags(trim($request->billing_in_charge_last_name)),
            'billing_in_charge_first_name' => strip_tags(trim($request->billing_in_charge_first_name)),
            'billing_in_charge_last_name_kana' => strip_tags(trim($request->billing_in_charge_last_name_kana)),
            'billing_in_charge_first_name_kana' => strip_tags(trim($request->billing_in_charge_first_name_kana)),
            'billing_in_charge_post' => strip_tags(trim($request->billing_in_charge_post)),
            'billing_in_charge_position' => strip_tags(trim($request->billing_in_charge_position)),
            'billing_phonenumber' => strip_tags(trim($request->billing_phonenumber)),
            'billing_zip_code' => strip_tags(trim($request->billing_zip_code)),
            'billing_prefecture_id' =>$request->billing_prefecture_id,
            'billing_city_id' => $request->billing_city_id,
            'billing_street_address'=> strip_tags(trim($request->billing_street_address)),
            'billing_building' => strip_tags(trim($request->billing_building)),
            'billing_fax' => strip_tags(trim($request->billing_fax)),
        ]);


        return response()->json(['message'=>'プロファイルは正常に変更されました。'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        //
    }
}
