<?php

namespace App\Services;

use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class KavenegarService
{
    protected $api;

    public function __construct()
    {
        $this->api = new KavenegarApi(config('services.kavenegar.api_key'));
    }

    public function sendOTP($receptor, $message)
    {
        try {
            $sender = "100075752"; // شماره خط تایید شده در کاوه‌نگار
            return $this->api->Send($sender, $receptor, $message);
        } catch (ApiException $e) {
            return $e->errorMessage();
        } catch (HttpException $e) {
            return $e->errorMessage();
        }
    }
}
