<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    public function pay()
    {
        $merchant_id = config('payment.zarinpal.merchant_id');
        $amount = 10000; // مبلغ به ریال
        $description = 'پرداخت بابت سفارش تست';
        $callback_url = route('payment.verify');

        $response = Http::post('https://sandbox.zarinpal.com/pg/v4/payment/request.json', [
            'merchant_id' => $merchant_id,
            'amount' => $amount,
            'description' => $description,
            'callback_url' => $callback_url,
            'metadata' => [
                'mobile' => '09120000000',
                'email' => 'test@example.com',
            ],
        ]);

        if ($response->successful() && $response['data']['code'] == 100) {
            $authority = $response['data']['authority'];
            return redirect("https://sandbox.zarinpal.com/pg/StartPay/{$authority}");
        }

        return back()->withErrors(['error' => 'خطا در اتصال به درگاه پرداخت']);
    }



public function verify(Request $request)
{
    $status = $request->input('Status');
    $authority = $request->input('authority');

    if (!$status || !$authority) {
        return "پارامترهای پرداخت ناقص هستند.";
    }

    if ($status !== 'OK') {
        return "پرداخت توسط کاربر لغو شد.";
    }

    $merchant_id = config('payment.zarinpal.merchant_id');
    $amount = 10000;

    $verifyResponse = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post('https://sandbox.zarinpal.com/pg/v4/payment/verify.json', [
        'merchant_id' => $merchant_id,
        'amount' => $amount,
        'authority' => $authority,
    ]);

    // بررسی دقیق‌تر پاسخ
    if ($verifyResponse->successful() && isset($verifyResponse['data']['code'])) {
        if ($verifyResponse['data']['code'] === 100) {
            $refId = $verifyResponse['data']['ref_id'];
            return "✅ پرداخت موفق بود. کد رهگیری: {$refId}";
        } elseif ($verifyResponse['data']['code'] === 101) {
            return "⚠️ پرداخت قبلاً تأیید شده بود.";
        } else {
            return "❌ خطا در تأیید پرداخت. کد: " . $verifyResponse['data']['code'];
        }
    }

    Log::error('Zarinpal verify error', [
        'response' => $verifyResponse->body()
    ]);

    return "❌ خطای غیرمنتظره هنگام تأیید پرداخت.";
}

}
