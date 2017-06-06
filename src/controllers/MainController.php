<?php

namespace controllers;
use core\Controller;
use models\LoginModel;


class MainController extends Controller
{
	public function indexAction()
	{
		$uri = explode('/',$_SERVER['REQUEST_URI']);
        $file = file_get_contents('C:\xampp\htdocs\registration-form\src\views\first-form.php');
		$ajax = $uri[count($uri)-1];
		if($ajax == 'ajax')
		{
           echo $file;
		}
		else
		{
            $this->view->generate('home','index.php',$file);
		}





	}
    public function secondFormAction()
    {
        $uri = explode('/',$_SERVER['REQUEST_URI']);
        $ajax = $uri[count($uri)-1];
        $file = file_get_contents('C:\xampp\htdocs\registration-form\src\views\second-form.php');
		if($ajax == 'ajax')
		{
            echo $file;
		}
		else
		{
            $this->view->generate('home','index.php',$file);
		}


    }
    public function secondDataAction()
	{
        $uri = explode('/',$_SERVER['REQUEST_URI']);
        $ajax = $uri[count($uri)-1];
        $file = file_get_contents('C:\xampp\htdocs\registration-form\src\views\social.php');
        if($ajax == 'ajax')
        {
            echo $file;
        }
        else
        {
            $this->view->generate('home','index.php', $file);
        }
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
 ?>
