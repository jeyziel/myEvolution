<?php 

namespace App\Classes;

class Section
{
	private $content;

	public function replaceSection($section,$data)
	{
		foreach ($data as $key => $value)
		{
			if(is_scalar($value))
				$this->content = str_replace("{$section}{$key}", $value, $this->content);
		}
	}

	public function sectionVariables($data)
	{
		$this->content = ob_get_clean();

		$this->replaceSection("@",$data);

		ob_end_flush();
		
		echo $this->content;
	}
}