<?php 
include "arrays.php";

$arr = ["blue", "green", "red", [[["1", "green", "red", "yellow"], "green", "red", "yellow"], "green", "red", "yellow"], "green", "orange", "yellow", "indigo", "red", "1","1"];
$arr2 = ["blue", "green", "red", "green", "orange", "yellow", "indigo", "red"];

$array = new Arrays\Arrays();
print_r($array->call($arr2, null, 'Arrays\Arrays::itemRemoveCb', "red"));
//print_r($array->call($arr2, 'Arrays\Arrays::itemRunCb', 'Arrays\Arrays::itemRemoveCb', "1"));
//print_r($array->call_skip($arr2, null, 'Arrays\Arrays::itemRemoveCb', "1"));
//print_r($array->call_map($arr2, 'Arrays\Arrays::itemRemoveCb', "1"));
//print_r($array->call_strict($arr, 'Arrays\Arrays::itemRunCb', 'Arrays\Arrays::itemRemoveCb', "1"));
//print_r($array->removeItem($arr, "red"));
