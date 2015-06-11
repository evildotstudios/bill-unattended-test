<?php

/**
* 
*/
class SanitizeTest extends PHPUnit_Framework_TestCase
{

	var $path;

	public function __construct()
	{
		$this->path = realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR;
	}

	public function testdoSanitize()
	{
		$sanitize = new \Sanitize;
		$content = new \Content;

		$source = $content::getContent($this->path.'bill.json');



		$test = $sanitize::doSanitize($source);

		$this->assertNotEmpty($test);
		$this->assertTrue(is_object($test));

		$this->assertObjectHasAttribute('statement',$test);
		$this->assertObjectHasAttribute('total',$test);
		$this->assertObjectHasAttribute('package',$test);
		$this->assertObjectHasAttribute('callCharges',$test);
		$this->assertObjectHasAttribute('skyStore',$test);
	}

}