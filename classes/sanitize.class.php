<?php

class Sanitize
{
	var $content;
	var $numOfItemsPerPage = 10;

	public static function doSanitize($content = false)
	{
		if(!$content) return false;

		$sanitize = new static();

		if(isset($content->callCharges->calls))
		{
			$content->callCharges->calls = $sanitize->paginateCalls($content->callCharges->calls);
		}

		return $content;
	}


	public function paginateCalls($calls = [])
	{
		$count = count($calls);
		if($count < 1) return false;

		if($count<11) return ['page_1'=>$calls];

		$output = [];

		$page = 1;
		$counter = 0;
		foreach($calls as $call)
		{
			if(!isset($output['page_'.$page])) $output['page_'.$page] = [];

			$output['page_'.$page][] = $call;

			if($counter == $this->numOfItemsPerPage)
			{
				$page++;
				$counter = 0;
			}
			$counter++;
		}
		return $output;
	}
}