<?php

namespace controllers;
use core\Controller;
use models\LoginModel;


class MainController extends Controller
{
	public function indexAction()
	{
		$this->view->generate('home','first-form.php');
	}
}
 ?>
