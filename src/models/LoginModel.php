<?php
    namespace models;
    use core\Model;

    class LoginModel extends Model
    {
        public function addMember($data)
        {

			$sql = "
				INSERT 
				INTO members (first_name,last_name,birthdate,country,phone,email,report)	 
				VALUES ( :first_name, :last_name, :birth_date, :country, :phone,:email, :report_subject)";
			return self::$query->execute($sql,$data);
        }
        public function checkEmail($email)
        {

        	return self::$query->queryAll('SELECT * FROM members WHERE email="' . $email . '" ');
        }
        public function updateMember($data, $email)
        {
        	$data['email'] = $email;
        	$sql = "UPDATE members 
					SET company = :company , position = :position , about = :about, photo = :photo   
					WHERE email = :email";
        	echo $sql;
        	return self::$query->execute($sql,$data);
        }

    }
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 05.06.2017
     * Time: 22:59
     */