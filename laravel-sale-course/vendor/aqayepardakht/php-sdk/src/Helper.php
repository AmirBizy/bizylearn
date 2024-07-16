<?php

namespace Aqayepardakht\PhpSdk;

class Helper {
    public static function validateCardsNumber($card) {
        if (!$card) return;

        $value = self::faToEnNumbers($card);
        if (!preg_match('/^\d{16}$/', $value)) {
            throw new \Exception('شماره کارت وارد شده نا معتبر است : '.$value);
        }
    }

    public static function validateMobileNumber($value) {
        if (!$value) return; 

        $value = self::faToEnNumbers($value);
        if (!(preg_match('/^(((98)|(\+98)|(0098)|0)(9){1}[0-9]{9})+$/', $value) || preg_match('/^(9){1}[0-9]{9}+$/', $value))? true : false) {
            throw new \Exception('شماره تلفن وارد شده نا معتبر است : '.$value);
        }
    }

    public static function validateEmail($email) {
        if (!$email) return;
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('ایمیل وارد شده نا معتبر است : '.$email);
        }
    }

    public static function validateUrl($url) {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            throw new \Exception('Callback Url نا معتبر است : '.$url);
        }
    }

    public static function faToEnNumbers($string) {
        $fa_num = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $en_num = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($fa_num, $en_num, $string);
    }

    public static function url($route = null) {
        $url = 'https://panel.aqayepardakht.ir/api/v2/';

        if ($route) $url .= $route;

        return $url;
    }

}