<?php
/**
 * Created by PhpStorm.
 * User: aberdnikov
 * Date: 19.11.2017
 * Time: 0:38
 */

namespace Larakit;

use Illuminate\Support\Arr;

class Recaptcha {
    
    static function check($code) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        $fields = [
            'secret'   => env('LARAKIT_RECAPTCHA'),
            'response' => $code,
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_str($fields));
        
        // in real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS,
        //          http_build_query(array('postvar1' => 'value1')));
        
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);
        
        curl_close($ch);
        $res = json_decode($server_output);
        
        return Arr::get($res, 'success');
    }
}