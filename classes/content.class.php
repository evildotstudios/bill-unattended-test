<?php

class Content
{
	/**
	 * getContent
	 * 
	 * fetches remote bill content
	 */
	public static function getContent($origin=false)
	{
		if(!$origin) return false;
		
		$content = file_get_contents($origin);
		
		if(strlen($content)<5) return false;
		$content = json_decode($content);

		if(!is_object($content)) return false;

		return $content;
	}
}