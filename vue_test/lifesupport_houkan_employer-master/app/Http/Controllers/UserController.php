<?php

    namespace App\Http\Controllers;

    use Auth;
    use App\Employer;
    use Validator;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        public function index()
        {
            return response()->json(Employer::with(['orders'])->get());
        }

        public function login(Request $request)
        {
            $status = 401;
            $response = ['error' => 'Unauthorised'];

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password'=> 'required'
            ]);
                
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $status = 200;
                $response = [
                    'user' => Auth::user(),
                    'token' => Auth::user()->createToken('houkan_employer')->accessToken,
                ];
            }

            return response()->json($response, $status);
        }

        public function pre_register(Request $request){

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'name_kana' => 'required|max:50',
                'in_charge_last_name' => 'required|max:50',
                'in_charge_first_name' => 'required|max:50',
                'in_charge_last_name_kana' => 'required|max:50',
                'in_charge_first_name_kana' => 'required|max:50',
                'phonenumber' => 'required|min:10|max:11',
                'email' => 'required|email|unique:employers',
            ]);

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
                'name' => 'required|max:50',
                'name_kana' => 'required|max:50',
                'in_charge_last_name' => 'required|max:50',
                'in_charge_first_name' => 'required|max:50',
                'in_charge_last_name_kana' => 'required|max:50',
                'in_charge_first_name_kana' => 'required|max:50',
                'phonenumber' => 'required|min:10|max:11',
                'email' => 'required|email|unique:employers',
                'zip_code' => 'required',
                'prefecture' => 'required',
                'city' => 'required',
                'street'=> 'required',
                'building' => '',
                'password' => 'required|min:8|max:32',
                'c_password' => 'required|same:password',
            ]);

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
                'zip' => strip_tags(trim($request->zip)),
                'prefecture' => strip_tags(trim($request->prefecture)),
                'city' => strip_tags(trim($request->city)),
                'street'=> strip_tags(trim($request->street)),
                'building' => strip_tags(trim($request->street)),
                'password' => bcrypt($request->password),
            ];

            $user = Employer::create($data);
            Auth::loginUsingId($user->id);
            return response()->json([
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('houkan_employer')->accessToken,
            ]);
        }

        public function show(User $user)
        {
            return response()->json($user);
        }

    }