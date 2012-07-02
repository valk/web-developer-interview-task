<?php

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ALL);


function __autoload($class)
{
    $path = dirname ( __FILE__ ) . "/classes/".$class.".class.php";
    require_once($path);
}
