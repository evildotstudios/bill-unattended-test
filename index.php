<?php

require('bootstrap.php');
require(APP . '/vendor/autoload.php');

use duncan3dc\Laravel\Blade as Blade;
use duncan3dc\Laravel\BladeInstance;


$content = file_get_contents($source);
$content = json_decode($content);

echo duncan3dc\Laravel\Blade::render('bill',['data'=>$content]);


