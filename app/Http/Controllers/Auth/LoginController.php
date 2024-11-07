<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function postLogin()
    {
        $email = request()->email;
        $password = request()->password;

        $user = User::where('email', $email)->first();
        if (!isset($user)) {
            $response = array(
                'key' => 0,
                'msg' => trans('cruds.not_exist_message'),
            );
        } elseif ($user->human_password != $password) {
            $response = array(
                'key' => 1,
                'msg' => trans('cruds.wrong_password'),
            );
        } else {
            $credentials = array(
                'email' => $email,
                'password' => $password,
            );
            if (Auth::attempt($credentials)) {
                $response = array(
                    'key' => 2,
                    'msg' => trans('cruds.login_successful'),
                );
            } else {
                $response = array(
                    'key' => 3,
                    'msg' => trans('cruds.wrong_email_password'),
                );
            }
        }
        return $response;
    }
    public function sendOtp()
    {
        $email = request()->email;
        $password = request()->password;
        $otp_type = request()->otp_type;

        $user = User::where('email', $email)->first();
        if (!isset($user)) {
            $response = array(
                'key' => 0,
                'msg' => trans('cruds.not_exist_message'),
            );
        } elseif ($user->human_password != $password) {
            $response = array(
                'key' => 1,
                'msg' => trans('cruds.wrong_password'),
            );
        } else {
            $digits = 4;
            $verification_code = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
            $mobile = $user->mobile_no;
            if (strpos($mobile, '+966') !== false) {
                $content = "رمز التحقق هو $verification_code لا تشارك احد";
                if ($otp_type == 1) {
                    sendSms($mobile, $content);
                } else {
                    semdEmail($user->email, $content);
                }
            } elseif (strpos($mobile, '+880') !== false) {
                $content = "Your OTP is $verification_code. Don't share it.";
                if ($otp_type == 1) {
                    sendSmsBD($mobile, $content);
                } else {
                    semdEmail($user->email, $content);
                }
            }

            $response = array(
                'key' => 2,
                'msg' => $verification_code,
            );
        }
        return $response;
    }
}