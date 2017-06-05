<?php
namespace core;
use core\Model;
use core\View;

session_start();
class Controller
{
	  public $view;
	  public $model;

	  function __construct($controllerName)
	  {
	    $this -> view = new View();
	  }

}

 ?>
