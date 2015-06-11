<?php

require('bootstrap.php');
require(APP . '/vendor/autoload.php');

// --- application level -------------------------------------------------
$content = \Content::getContent($source);
$content = \Sanitize::doSanitize($content);

		//echo '<pre>';var_dump($content);echo '</pre>';die();

// --- presentation level ------------------------------------------------
use duncan3dc\Laravel\Blade as Blade;
use duncan3dc\Laravel\BladeInstance;

echo duncan3dc\Laravel\Blade::render('bill',['data'=>$content]);