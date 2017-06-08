<?php
namespace controllers;

use core\Controller;

class ErrorController extends Controller
{
	public function indexAction()
	{
		$this -> view -> generate('error', 'error.php');
	}
}