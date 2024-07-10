<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function createToken($email, $userId)
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'bsdmsat',
            'iat' => time(),
            'exp' => time() + 60 * 60 * 24 * 30,
            'email' => $email,
            'userId' => $userId
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
    public static function createTokenForResetPassword($email)
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'bsdmsat',
            'iat' => time(),
            'exp' => time() + 60 * 10,
            'email' => $email,
            'userId' => "0",
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
    public static function verifyToken($token)
    {
        try {
            if ($token == null) {
                return "unauthorized";
            } else {
                $key = env('JWT_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded;
            }
        } catch (\Exception $e) {
            return "unauthorized";
        }
    }
}