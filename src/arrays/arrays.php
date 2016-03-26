<?php
/*

File: arrays.php
Author: Ganesh Bhat
Email: ganeshsurfs@gmail.com 
License: MIT License
Details: Array Manipulation class Arrays
Compatibility: PHP 5.6 and above
Documentation File: src/arrays/README.md

*/

namespace Arrays;

class Arrays
{
    function __construct(){}

    public function call_strict(array $arrs, callable $checks, callable $callback, $userdata) {
        foreach($arrs as $k => $v) {
            if (is_array($v)) {
                $arrs[$k] = $this->call_strict($v, $checks, $callback, $userdata);
            } else {
                if ($checks($arrs, $v, $k, $userdata)) {
                    $arrs = $callback($arrs, $v, $k, $userdata);
                }
            }
        }
        return $arrs;
    }

    public function call_skip(array $arrs, $checks, callable $callback, $userdata) {
        if($checks === null){
            $checks = function($arrs, $v, $k, $userdata){return true;};
        }
        return $this->call_strict($arrs, $checks, $callback, $userdata);
    }
    
    public function call_map(array $arrs, callable $callback, $userdata) {
        $checks = function($arrs, $v, $k, $userdata){return true;};
        return $this->call_strict($arrs, $checks, $callback, $userdata);
    }
    
    public function call(array $arrs, $checks, callable $callback, $userdata){
        if($checks === null){
            return $this->call_skip($arrs, $checks, $callback, $userdata);
        }else {
            return $this->call_strict($arrs, $checks, $callback, $userdata);
        }
    }

    public static function itemRunCb($arrs, $item, $key, $userdata) {
        if ($item === $userdata) { return true; } 
        else { return false; };
    }

    public static function itemRemoveCb($arrs, $item, $key, $userdata) {
        unset($arrs[$key]);
        return $arrs;
    }    

    public function removeItem($arr,$arrItem){
        $arrs = $this->call_strict($arr, 'Arrays::itemRunCb', 'Arrays::itemRemoveCb', $arrItem);
        return $arrs;
    }
    
    public function removeItems($arr,$arrItems){
        $arrs = $this->call_strict($arr, 'Arrays::itemRunCb', 'Arrays::itemRemoveCb', $arrItem);
        return $arrs;
    }
}

