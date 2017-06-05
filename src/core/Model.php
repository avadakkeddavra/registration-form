<?php
namespace core;
// include 'DB.php';
// include 'DBQuery.php';
use core\DB;
use core\DBQuery;
class Model
{
	public static $db;
	public static $query;

	public function __construct()
	{
		self::$db = DB::connect('mysql:dbname=academy;host=localhost;charset=UTF8', 'root', '','');
    	self::$query = new DBQuery(self::$db);
	}


	public function getAllItems($tablename)
	{
		return self::$query->queryAll('SELECT * from ' . $tablename . '');
	}
	public function getOneItemById($tablename, $id)
	{
		return self::$query->queryAll('SELECT * from ' . $tablename . ' WHERE id=' . $id . '');
	}

}

 ?>
