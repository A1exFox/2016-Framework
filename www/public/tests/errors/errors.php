<?php
echo 'Start errors.php <br>';

// (2)E_WARNING // error_handler();
//echo $undefined_var; // UNCOMMENT

// (16384)E_USER_DEPRECATED // error_handler()
// ...similary for (E_USER_NOTICE, E_USER_WARNING)
//trigger_error("E_USER_DEPRECATED", E_USER_DEPRECATED); // UNCOMMENT

// (256)E_USER_ERROR // error_handler();
//trigger_error("E_USER_ERROR", E_USER_ERROR);

// (1)E_ERROR // exception_handler()
//undefined_function(); // UNKOMMENT
//array_key_exists('key', NULL); // UNKOMMENT
//split('[/.-]', "12/21/2012"); // UNKOMMENT
//class c {function f(){}} c::f(); // UNKOMMENT
//class b {function f(int $a){}} $b = new b; $b->f(NULL); // UNKOMMENT

//throw new Exception('Service unavailable');
//throw new NotFoundException('File not found');

// (4)E_PARSE // exception_handler()
//parse_error // UNKOMMENT

// (64)E_COMPILE_ERROR // fatal_error_handler
//$var[];

echo 'End errors.php';