<?php
namespace controllers;

use core\Controller;
use models\LoginModel;

class SendController extends Controller
{
	public function indexAction()
	{
		print_r($_POST);
//		echo true;

	}
	public function nextPageAction()
	{
		print_r($_POST);
		$this -> view -> generate('nextPage', 'second-form.php');
	}
	public function uploadPhotoAction() {

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