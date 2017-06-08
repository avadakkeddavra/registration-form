<?php

namespace controllers;
use core\Controller;
use models\LoginModel;


class MainController extends Controller
{
	public function indexAction()
	{
		$uri = explode('/',$_SERVER['REQUEST_URI']);
        $file = file_get_contents('views/first-form.php');
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
        $file = file_get_contents('http://solodukhin-as.groupbwt.com/views/second-form.php');
		if($ajax == 'ajax')
		{
//            echo $file;
            $status = MainController::checkFirstFormDataAction();
            if(is_string($status))
            {
            	echo "<span class='error'>$status</span>";
            }
            else
            {
            	$LoginModel = new LoginModel();
            	$answer = $LoginModel -> addMember($status);
            	if($answer != false)
	            {
		            echo $file;
	            }
				else{
            		echo '<span class="error">data base request error</span>';
				}
            }

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
        $file = file_get_contents('views/social.php');
        if($ajax == 'ajax')
        {
            $status = MainController::checkSecondFormDataAction();
            $email = $_SESSION['email'];

            if(is_string($status))
            {
            	echo $status;
            }
            else{
	            $LoginModel = new LoginModel();
	            $answer = $LoginModel -> updateMember($status,$email);
	            if($answer != false)
	            {
		            echo $file;
	            }
	            else{
		            echo '<span class="error">data base request error</span>';
	            }
            }
        }
        else
        {
	        //$this->view->generate('home','index.php',$file);
            header('Location: http://form.local/');
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
    public static function checkFirstFormDataAction()
    {

	    $data = [];

		if(textValidation($_POST['first_name']) == true)
		{
			$data['first_name'] = $_POST['first_name'];
		}
		else{
			return 'First name error';
		}
	    if(textValidation($_POST['last_name']) == true)
	    {
		    $data['last_name'] = $_POST['last_name'];
	    }
	    else{
		    return 'Last name error';
	    }
	    if (textValidation($_POST['report_subject']) == true)
	    {
		    $data['report_subject'] = $_POST['report_subject'];
	    }
	    else{
		    return 'Report subject error';
	    }
	    if (phoneValidation($_POST['phone']) == true)
	    {
		    $data['phone'] = $_POST['phone'];
	    }
	    else{
		    return 'Phone error';
	    }
	    if (dateValidation($_POST['birth_date']) == true)
	    {
		    $data['birth_date'] = $_POST['birth_date'];
	    }else{
		    return 'date error';
	    }
	    if(isset($_POST['country']))
	    {
	    	$data['country'] = $_POST['country'];
	    }
	    else{
			return 'Country error';
	    }
	    if(emailValidation($_POST['email']) == true)
	    {
		    $data['email'] = $_POST['email'];
	    }else{
			return 'Error data';
	    }
		return $data;
		//$login_model = new LoginModel();
    }

    public static function checkSecondFormDataAction()
    {
    	$data = [];
    	$data['photo'] = $_POST['photo'];
		if(textareaValidation($_POST['company']) == true)
		{
			$data['company'] = $_POST['company'];
		}
		else{
			return 'Company error';
		}
		if(textareaValidation($_POST['position']) == true)
		{
			$data['position'] = $_POST['position'];
		}
		else{
			return 'Position error';
		}
		if(textareaValidation($_POST['about']) == true)
		{
			$data['about'] = $_POST['about'];
		}
		else{
			return 'About error';
		}
		return $data;
    }
    public function checkEmailAction()
    {
		$loginModel = new LoginModel();
		$data = $loginModel->checkEmail($_POST['email']);
	    if($data == false)
	    {
		    echo 1;
	    }
	    else{
		    echo 0;
	    }

		$_SESSION['email'] = $_POST['email'];


    }
    public function allMembersAction()
    {
    	$loginModel = new LoginModel();
    	$data = $loginModel -> getAllItems('members');
    	if($data == false)
	    {
		    $data = '<span class="error">data base request error</span>';
	    }
	    $this -> view -> generate('all members', 'all_members.php',$data);
    }
  
}
 ?>
