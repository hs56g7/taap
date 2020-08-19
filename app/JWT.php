<?php

namespace App;

class JWT
{
    public function encode($payload)
    {
        $key = config('env.secret_key');

        $header = json_encode(array("alg"=>"HS256", "typ"=>"JWT"));
        $header = base64_encode($header);

        $payload = json_encode($payload);
        $payload = base64_encode($payload);

        $signature = hash_hmac('sha256', $header.$payload, $key, true);
        $signature = base64_encode($signature);

        $token = "$header.$payload.$signature";

        return $token;
    }

    public function decode($token)
    {
        $key = config('env.secret_key');

        $jwt_values = explode('.', $token);

        $test_pay;
        $test_sig;

        if(isset($jwt_values[1]))
        {
            $test_pay = $jwt_values[1];
        }
        else
        {
            return false;
        }

        $test_head = $jwt_values[0];

        if(isset($jwt_values[2]))
        {
            $test_sig = $jwt_values[2];
        }
        else
        {
            return false;
        }

        $sig_2 = hash_hmac('sha256', $test_head.$test_pay, $key, true);
        $sig_2 = base64_encode($sig_2);

        if($test_sig == $sig_2)
        {
            $info = json_decode(base64_decode($jwt_values[1]));
            return $info;
        }
        else
        {
            return false;
        }
    }
}
