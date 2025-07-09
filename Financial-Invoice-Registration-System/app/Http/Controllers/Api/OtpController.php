<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Kavenegar\KavenegarApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OtpController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'regex:/^09\d{9}$/']
        ]);

        try {
            $code = rand(100000, 999999);
            Cache::put('otp_' . $request->mobile, $code, now()->addMinutes(3));

            $api = new KavenegarApi(env('KAVENEGAR_API_KEY'));
            $sender = "100075752";
            $message = "کد ورود شما: $code";
            $api->Send($sender, $request->mobile, $message);

            return response()->json(['status' => 'sent']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'regex:/^09\d{9}$/'],
            'otp'   => ['required', 'digits:6']
        ]);

        $cachedCode = Cache::get('otp_' . $request->mobile);

        if ($cachedCode && $cachedCode == $request->otp) {
            // اگر کاربر وجود نداشت، ایجادش کن
            $user = User::firstOrCreate(
                ['mobile' => $request->mobile],
                // ['name' => 'کاربر جدید'] // می‌تونی مقادیر بیشتری بزاری
            );

            Auth::login($user);

            // پاک کردن کد از کش
            Cache::forget('otp_' . $request->mobile);

            return response()->json(['status' => 'verified', 'redirect' => route('admin.dashboard')]);
        } else {
            return response()->json(['status' => 'invalid']);
        }
    }
}
