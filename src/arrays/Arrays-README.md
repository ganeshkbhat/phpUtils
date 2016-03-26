## DOCUMENT DETAILS:
--------------------

    File: arrays.php
    Author: Ganesh Bhat
    Email: ganeshsurfs@gmail.com 
    License: MIT License
    Details: Array Manipulation class Arrays
    Compatibility: PHP 5.6 and above
    Source File: src/arrays/arrays.php
    Example Usage File: src/arrays/usage.php


## ARRAYS:
---------

    Namespace: Arrays
    Class: Arrays


## DESCRIPTION:
---------------

`array.php` is a file which contains the class `Arrays` which handles data modification of Arrays whether complex nested or simple. These arrays can be modified using a callback provided to the respective functions. You can also use a check callback function passed as an argument to do a boolean check of whther a perticular modification callback should be implemented or not. The callbacks, both modification callback and callback-run-check callback, have access to the main array, each iterations key-value pair, and any user defined parameter provided during the initialization of the Arrays function.  


## FUNCTIONS: 
-------------

    Array modifier class and functions handle simple or complex arrays modification recursively
    Passes back new modified array object
        
    MAIN FUNCTIONS: 
        public function Arrays::call
        public function Arrays::call_map
        public function Arrays::call_skip
        public function Arrays::call_strict
        public function Arrays::removeItem
        public static function Arrays::itemRunCb
        public static function Arrays::itemRemoveCb
        ToDo: Arrays::removeItems
        ToDo: Arrays::modifyItem
        ToDo: Arrays::removeItems


## FUNCTION DEFINITIONS:
------------------------


**Arrays::call**

    Functionality: 
        Calls the callback on all items of array after a boolean check from callbackChecks function. 
        Optionally callbackChecks can be specified as null. 
        Both callback and callbackChecks have access to array, each item's key-value, and userdata
    Usage: 
        Arrays::call(array, callbackChecks, callback, userdataForCallback)
    Returns:
        New assignable modified array
    Optional Usage**
        Arrays::call(array, null, callback, userdataForCallback)
    Returns**
        New assignable modified array


**Arrays::call_map**

    Functionality: 
        Calls the callback on all items of array. 
        callback has access to array, each item's key-value, and userdata
    Usage:
        Arrays::call_map(array, callback, userdataForCallback)
    Returns: 
        New assignable modified array
      
        
**Arrays::call_skip**

    Functionality: 
        Calls the callback on all items of array. 
        callbackChecks specified as null (needed). 
        callback has access to array, each item's key-value, and userdata
    Usage:
        Arrays::call(array, null, callback, userdataForCallback)
    Returns:
        New assignable modified array


**Arrays::call_strict**

    Functionality: 
        Calls the callback on all items of array after a boolean check from callbackChecks function. 
        Compulsorily callbackChecks has to be specified as a boolean returning callable function. 
        Both callback and callbackChecks have access to array, each item's key-value, and userdata
    Usage:
        Arrays::call_strict(array, callbackChecks, callback, userdataForCallback)
    Returns: 
        New assignable modified array


**Arrays::removeItem**

    Functionality: 
        Calls the remove callback on all items of array after a boolean check from callbackChecks function. 
        userdataValueForCallback is a single identifier and can be of any primitive datatype
    Usage:
        Arrays::removeItem(array, userdataValueForCallback)
    Returns
        New assignable modified array


**Arrays::removeItems**

    Functionality: 
        Calls the remove callback on all items of array after a boolean check from callbackChecks function. 
        userdataValuesArrayForCallback is a array of identifiers
        Each item of userdata array can be of any primitive datatype
    Usage
        Arrays::removeItems(array, userdataValuesArrayForCallback)
    Returns
        New assignable modified array


## PRE-DEFINED CALLBACK FUNCTION DEFINITIONS: 
------------------------------------


**Array::itemRunCb** 

    Functionality:
        This is a pre-defined modifier-callback-run-check callback returning a boolean value.
        Used by `Arrays` class function `Arrays::removeItem` to check whether modifier callback `itemRemoveCb` runs.
        The `userdataValueForCallback` or  is matched with the item value and if true return true or vice versa.
        `$itemValue === userdataValueForCallback`.
        Not needed by Arrays::call, Arrays::call_map, Arrays::call_skip, Arrays::call_strict but can be re-used.
    Definition:
        Arrays::itemRunCb(array, itemValue, key, userdataForCallback)
        Arrays::itemRunCb(array, itemValue, key, userdataValueForCallback)
    Usage or Used Internally as:
        `Arrays::call_strict($arr, 'Arrays::itemRunCb', 'Arrays::itemRemoveCb', $arrItem);`
        `$arraysObject->call_strict($arr, 'Arrays::itemRunCb', 'Arrays::itemRemoveCb', $arrItem);`
    Returns
        Boolean    


**Array::itemRemoveCb** 

    Functionality:
        This is a pre-defined modifier callback returning an new modified array.
        Uses the `Arrays` class function `Arrays::itemRunCb` to check whether modifier callback `itemRemoveCb` runs.
        Runs the unset function on the itemValue which matchs `userdataValueForCallback` passed.
        Not needed by Arrays::call, Arrays::call_map, Arrays::call_skip, Arrays::call_strict but can be re-used.
    Definition:
        Arrays::itemRemoveCb(array, itemValue, key, userdataForCallback) 
        Arrays::itemRemoveCb(array, itemValue, key, userdataValueForCallback)
    Usage or Used Internally as:
        `Arrays::call_strict($arr, 'Arrays::itemRunCb', 'Arrays::itemRemoveCb', $arrItem);`
        `$arraysObject->call_strict($arr, 'Arrays::itemRunCb', 'Arrays::itemRemoveCb', $arrItem);`
    Returns
        New modified array 


## FUNCTIONS ARGUMENT DEFINITIONS: 
----------------------------------


**array** 

    Array to be modified.
    Can be a simple or complex nested array of any number of nesting.
        
        
**callback**

    Modifier Callback to run on the array for modification. 
    Compulsorily returns the new array after modification. 
    If no new modified array is returned then all the Arrays functions returns an null value.
    
*callback arguments:*
    Has access to the array to be modified, each iteration's key, each iteration's value, and the passed userdata
    Array to be modified is the first argument (internals).
    Key is the second argument (internals).
    Value is the third argument (internals).
    Userdata passed is the fourth argument (it is passed as final argument for Arrays class function).

*Example callback Input:*
`function($arrs, $item, $key, $userdata) { echo "Your Manipulation Code Here"; return $arrs; };`
        
        
**callbackChecks**

    Callback to run to check whether the modifier callback should run or skip.
    Compulsorily returns a boolean (true or false). A no return value will be identified as false
    A null can be passed in case of Array::call, Array::call_skip. Compulsory in case of Array::call_strict
    This argument can be skipped as per Array function definition

*callbackCheck arguments:*
    Has access to the array to be modified, each iteration's key, each iteration's value, and the passed userdata
    Array to be modified is the first argument (internals)
    Key is the second argument (internals)
    Value is the third argument (internals)
    Userdata passed is the fourth argument (it is passed as final (third or fourth) argument for Arrays class function).
 
*Example callback Input:*
`function($arrs, $value, $key, $userdata){ return true; };`
        
        
**userdataForCallback**

    Userdata passed is the third or fourth argument of each Arrays class function depending on definition.
    Available as the fourth argument for callbackChecks or callback argument callable functions passed.
    Single variable of any primitive data type.
    Can be a single variable or array of variables as per need of both callbacks.
    Can be passed as reference values.

*Possible Value Inputs:*
(string) `"my new string"`, (integer) `1`, (Boolean) `true`, 
(Array Object) `array("key"=>"value")`, (Array Object) `[1,2]`, etc.


**userdataValueForCallback**

    Userdata passed is the second argument of `Arrays::removeItem` Arrays class function.
    Available as the fourth argument for callbackChecks or callback argument callable functions passed.
    Single variable of any primitive data type based on Array type. Will not be iterated on itself.
    Can be a single variable or array of variables as per need of both callbacks or array.
    Similar to `userdataForCallback` usage unless `userdataForCallback` is used as an array.
    
*Possible Value Inputs:*
(string) `"my new string"`, (integer) `1`, (Boolean) `true`
        

**userdataValuesArrayForCallback**

    Userdata passed is the second argument of `Arrays::removeItems` Arrays class function.
    Available as the fourth argument for callbackChecks or callback argument callable functions accessed internally.
    Array containing any primitive data type items as per need of modification of array. 
    Will be iterated on itself within the callbackChecks function.
    Each item of array can be a single variable or array of variables as per need of both callbacks or array.


## ToDo:
--------

    More instantly usable Array modifiers to be added
    New modifiers or array handlers to be added as per request
    Return modified items
    Return unmodified items
    Return new array and all items (new array, modified items, unmodified items)


# License: 
----------

MIT License
