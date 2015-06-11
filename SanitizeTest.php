<?php

/**
* 
*/
class SanitizeTest extends PHPUnit_Framework_TestCase
{
	var $sanitize;
	var $content;

	public function __construct()
	{
		$this->sanitize = new \Sanitize;
		$this->content = \Content::getContent();
	}
	public function testdoSanitize()
	{

	}

	public function testpaginateCalls()
	{
		
	}
}