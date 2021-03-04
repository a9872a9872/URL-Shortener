<?php
class Url {
    public function getShortUrl($length): string {
        $code = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for ($i = 0; $i < $length; $i++) {
            $code .= $pattern[mt_rand(0, strlen($pattern) - 1)];
        }

        return $code;
    }

    public function checkUrlVerify($url): bool {
        $ch = curl_init();
        curl_setopt($ch , CURLOPT_URL , "{$url}");
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}