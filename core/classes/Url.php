<?php
class Url {
    public static function part($number) {
        $parts = explode("/",$_SERVER["REQUEST_URI"]);
        return isset($parts[$number]) ? $parts[$number] : false;
    }

    public static function post($key) {
        return (isset($_POST[$key])) ? $_POST['key'] : false;
    }

    public static function get($key) {
        return (isset($_GET[$key])) ? urldecode($_GET[$key]) : false;
    }

    public static function request($key) {
        if(Url::get($key)) {
            return Url::get($key);
        } else if(Url::post($key)) {
            return Url::post($key);
        } else {
            return false;
        }
    }

    public static function build($url,$params) {
        if(strpos($url,"//") == false) {
            $prefix = "//".$GLOBALS['config']['domain'];        
        } else {
            $prefix = "";    
        }

        $params = implode("&",$params);
    }
}