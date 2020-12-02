<?php

namespace Core;

use Exception;

class JWT
{
    protected static function generateSignature(string $base64Header, string $base64Payload) : string
    {
        return hash_hmac('SHA256', $base64Header . '.' . $base64Payload, 'my_secret_key');
    }

    public static function generateToken(array $header, array $payload) : string
    {
        $headerEncode = base64_encode(json_encode($header, JSON_UNESCAPED_UNICODE));
        $payloadEncode = base64_encode(json_encode($payload, JSON_UNESCAPED_UNICODE));
        $signature = self::generateSignature($headerEncode, $payloadEncode);
        return $headerEncode . '.' . $payloadEncode . '.' . $signature;
    }

    public static function verificationToken(string $JwtToken) : bool
    {
        $arToken = explode('.', $JwtToken);
        if (count($arToken) != 3) {
            throw new Exception('Token must consist of 3 parts');
        }
        $header = $arToken[0];
        $payload = $arToken[1];
        $signature = $arToken[2];
        return ($signature == self::generateSignature($header, $payload)) ? true : false;
    }
}