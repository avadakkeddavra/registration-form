<?php
class Loader
{

	public  function loadClass($class_name)
	{
		$arr = explode('\\', $class_name);
		
		$prefix = array_shift($arr);


		if($prefix == 'core')
		{
			$pref_file = 'core/';
		} 
		elseif($prefix == 'controllers')
		{
			$pref_file = 'controllers/';
		}
		elseif($prefix == 'models')
		{
			$pref_file = 'models/';
		}

		

		$file = $pref_file . array_shift($arr) .'.php';

		if(is_file($file))
		{
				//echo $file;
				require_once $file;
		}
			
		
	}
}

 ?>
