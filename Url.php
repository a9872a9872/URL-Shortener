<?php
class Url {
    public function getShortUrl($length): string {
        $code = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for ($i = 0; $i < $length; $i++) {
            $code .= $pattern{mt_rand(0,63)};
        }

        return $code;
    }
}