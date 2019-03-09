<?php

namespace App\Http\Controllers\Auth;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Code;
use App\Rules\Password;
use App\Rules\Phone;
use App\Rules\Katakana;
use App\EmployerImage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $attributes = [
        'name' => '法人名・貴社名',
        'name_kana' => '法人名・貴社名(フリガナ)',
        'in_charge_last_name' => '担当者氏名(姓)',
        'in_charge_first_name' => '担当者氏名(名)',
        'in_charge_last_name_kana' => '担当者氏名(フリガナ)(姓)',
        'in_charge_first_name_kana' => '担当者氏名(フリガナ)(名)',
        'phonenumber' => '電話番号',
        'email' => 'メールアドレス',
        'zip_code' => '郵便番号	',
        'prefecture_id' => '都道府県',
        'city_id' => '市区町村',
        'street_address' => '町名・番地',
        'building' => '建物名',
        'fax' => 'FAX番号',
        'password' => 'パスワード',
        'c_password' => 'パスワード（確認）',
    ];

    protected $messages = [
        'required' => ":attribute は必須項目です。",
        'email.email' => ":attribute がメールアドレスと一致していません。",
        'email.unique' => ":attribute 同一のメールアドレスが既に登録されています。",
        'c_password.same' => ':attribute はパスワードと一致していません。',
        'name_kana.regex' => '全角カタカナを入力してください。',
        'in_charge_last_name_kana.regex' => '全角カタカナ(セイ)を入力してください。',
        'in_charge_first_name_kana.regex' => '全角カタカナ(メイ)を入力してください。',
        'password.regex' => 'パスワードは8文字以上から32文字以下で、アルファベットの大文字・小文字、
        数字、記号（!@#$%^&*）から最低3種類の文字を含んでいる必要があります。'
    ];

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function pre_register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required','string','max:128'],
            'name_kana' => ['nullable','string','max:128',new Katakana],
            'in_charge_last_name' =>  ['required','string','max:128'],
            'in_charge_first_name' =>  ['nullable','string','max:128'],
            'in_charge_last_name_kana' => ['nullable','string','max:128',new Katakana],
            'in_charge_first_name_kana' => ['nullable','string','max:128',new Katakana],
            'phonenumber' =>  ['required',new Phone],
            'email' => 'required|email|unique:employers',
        ],$this->messages,$this->attributes);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'name' => strip_tags(trim($request->name)),
            'name_kana' => strip_tags(trim($request->name_kana)),
            'in_charge_last_name' => strip_tags(trim($request->in_charge_last_name)),
            'in_charge_first_name' => strip_tags(trim($request->in_charge_first_name)),
            'in_charge_last_name_kana' => strip_tags(trim($request->in_charge_last_name_kana)),
            'in_charge_first_name_kana' => strip_tags(trim($request->in_charge_first_name_kana)),
            'phonenumber' => strip_tags(trim($request->phonenumber)),
            'email' => strip_tags(trim($request->email)),
        ];

        return response()->json(['user' => $data],200);
    }

    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => ['required','string','max:128'],
            'name_kana' => ['nullable','string','max:128',new Katakana],
            'in_charge_last_name' =>  ['required','string','max:128'],
            'in_charge_first_name' =>  ['nullable','string','max:128'],
            'in_charge_last_name_kana' => ['nullable','string','max:128',new Katakana],
            'in_charge_first_name_kana' => ['nullable','string','max:128',new Katakana],
            'phonenumber' => ['required',new Phone],
            'email' => 'required|email|unique:employers',
            'zip_code' => 'required',
            'prefecture_id' => 'required',
            'city_id' => 'required',
            'street_address'=> 'required',
            'building' => '',
            'fax' => ['nullable',new Phone],
            'password' => ['required',new Password],
            'c_password' => 'required|same:password',
        ],$this->messages,$this->attributes);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }


        $data = [
            'name' => strip_tags(trim($request->name)),
            'name_kana' => strip_tags(trim($request->name_kana)),
            'in_charge_last_name' => strip_tags(trim($request->in_charge_last_name)),
            'in_charge_first_name' => strip_tags(trim($request->in_charge_first_name)),
            'in_charge_last_name_kana' => strip_tags(trim($request->in_charge_last_name_kana)),
            'in_charge_first_name_kana' => strip_tags(trim($request->in_charge_first_name_kana)),
            'phonenumber' => strip_tags(trim($request->phonenumber)),
            'email' => strip_tags(trim($request->email)),
            'zip_code' => strip_tags(trim($request->zip_code)),
            'prefecture_id' =>$request->prefecture_id,
            'city_id' => $request->city_id,
            'street_address'=> strip_tags(trim($request->street_address)),
            'building' => strip_tags(trim($request->building)),
            'password' => bcrypt($request->password),
        ];

        if($user = Employer::create($data)){
            Code::send_employer_registration_to_employer($user);
            Code::send_employer_registration_to_operator($user);

            
         if(isset($request->images) && !empty($request->images))
         {
            foreach($request->images as $image)
            {
                $imageIDs[] = $image['id'];
            }
        
            EmployerImage::whereIn('id',$imageIDs)->update(['employer_id'=>$user->id]);
         }
        }
        \Auth::loginUsingId($user->id);
        
      
        
      
    }

}
