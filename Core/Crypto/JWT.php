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


    public static function stripToken(string $JwtToken) : ?array
    {
        $arResult = [];
        $arToken = explode('.', $JwtToken);
        if (count($arToken) != 3) {
            throw new Exception('Token must consist of 3 parts');
        }
        $arResult['header'] = $arToken[0];
        $arResult['payload'] = $arToken[1];
        $arResult['signature'] = $arToken[2];
        return self::verificationToken($arResult['header'], $arResult['payload'], $arResult['signature']) ?
            $arResult : null;
    }

    protected static function verificationToken(string $header, string $payload, string $signature) : bool
    {
        return ($signature == self::generateSignature($header, $payload)) ? true : false;
    }
}