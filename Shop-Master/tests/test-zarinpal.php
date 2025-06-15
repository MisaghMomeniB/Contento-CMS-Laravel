<?php
// تست اتصال به API زرین‌پال با CURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://sandbox.zarinpal.com/pg/v4/payment/request.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// مقدار تستی می‌فرستیم
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'merchant_id' => 'a1b2c3d4-e5f6-7890-abcd-ef1234567890',
    'amount' => 1000,
    'callback_url' => 'http://localhost/payment/verify',
    'description' => 'تست اتصال'
]));

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$error = curl_error($ch);

curl_close($ch);

// نمایش نتیجه
if ($error) {
    echo "❌ cURL Error: " . $error;
} else {
    echo "✅ پاسخ از زرین‌پال:\n";
    echo $response;
}
