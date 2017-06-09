<?php
namespace core;
use controllers\ErrorController;
require_once 'load.php';

class Routing
{
	public function execute()
	{
		$controllerName = 'Main';
		$actionName = 'index';
		$piecesOfUrl = explode('/', $_SERVER['REQUEST_URI']);

		if (!empty($piecesOfUrl[1]))
		{
			$controllerName = $piecesOfUrl[1];
		}
		if (!empty($piecesOfUrl[2]))
		{
			$actionName = $piecesOfUrl[2];
		}
		
		$controller =  'controllers\\' . $controllerName . 'Controller';

		$actionName = $actionName .'Action' ;

		// if(class_exists($controller) == true)
		// {
			$controller = new $controller();

		// 	if(method_exists($controller,$actionName) == true)
		// 	{
				$controller -> $actionName();
		// 	}
		// 	else{
		// 		$controller = new ErrorController();
		// 		$controller -> indexAction();
		// 	}

		// }
		// else{
		// 	$controller = new ErrorController();
		// 	$controller -> indexAction();
		// }


	}	

}
?>
