<?php
include_once('autoloader.php');

define('TESTDIR',realpath(dirname(__FILE__)));
$testSource = TESTDIR.DIRECTORY_SEPARATOR.'bill.json';

AutoLoader::registerDirectory(TESTDIR.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'classes');