<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Jenssegers\Agent\Agent as UserAgent;
use Validator;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $userAgent;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $attributes = [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ];

    protected $messages = [
        'required' => ":attribute は必須項目です。",
    ];

    public function __construct(UserAgent $userAgent)
    {
        $this->userAgent = $userAgent;
        $this->middleware('guest')->except('logout');
    }

      /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(UserAgent $userAgent)
    {
        if($this->userAgent->isMobile())
        {
            return view('mobileview.auth.login');
        }
        return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {
        $validator = $this->validate($request,[
            $this->username() => 'required|string',
            'password' => 'required|string',
        ],$this->messages,$this->attributes);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() =>"メールアドレスまたはパスワードが違います。",
        ]);
    }
}
