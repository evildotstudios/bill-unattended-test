<?php

// --- enviroment vars -----------------------------------------------------------------------------
define('APP',realpath(dirname(__FILE__)));
$source = 'http://safe-plains-5453.herokuapp.com/bill.json';
$source = APP.DIRECTORY_SEPARATOR.'bill.json';

// --- bootstrap -----------------------------------------------------------------------------------
setlocale(LC_MONETARY, 'en_GB');

// --- set autoloader for adicional classes --------------------------------------------------------
spl_autoload_register(function ($class) {
	$file = APP . DIRECTORY_SEPARATOR .'classes' . DIRECTORY_SEPARATOR . strtolower($class) . '.class.php';
	if(file_exists($file)) include($file);
});
