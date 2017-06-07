<?php
namespace controllers;

use core\Controller;
use models\LoginModel;

class SendController extends Controller
{
	public function indexAction()
	{
        $this->view->generate('home','index.php');

	}
	public function nextPageAction()
	{
        //$this->view->generate('home','index.php');
        $file = file_get_contents('C:\xampp\htdocs\registration-form\src\views\second-form.php');
        echo $file;

	}
	public function uploadPhotoAction()
    {

		$data = array();

		if ( isset( $_FILES ) && isset( $_FILES['photo'] ) ) {
			$error = false;
			$files = array();

			$uploaddir = './img/'; // . - текущая папка где находится submit.php

			// Создадим папку если её нет

			if ( ! is_dir( $uploaddir ) ) {
				mkdir( $uploaddir, 0777 );
			}

			// переместим файлы из временной директории в указанную
			foreach ( $_FILES as $file ) {
				if ( move_uploaded_file( $file['tmp_name'], $uploaddir . basename( $file['name'] ) ) ) {
					$files[] = realpath( $uploaddir . $file['name'] );
				} else {
					$error = true;
				}
			}

			$data = $error ? array( 'error' => 'Ошибка загрузки файлов.' ) : array( 'files' => $file['name'] );

			echo json_encode( $data );

		}
	}
}
/**
 * Created by PhpStorm.
 * User: solodukhin_as
 * Date: 06.06.2017
 * Time: 12:59
 */