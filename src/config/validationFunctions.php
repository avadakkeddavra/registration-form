<?php
/**
 * Created by PhpStorm.
 * User: solodukhin_as
 * Date: 07.06.2017
 * Time: 11:14
 */
function textValidation($src)
{
	return preg_match('/^([A-z]+[\']?)[A-z]+$/', $src);
}
function  nameValidation($src)
{
	return preg_match('/^[A-z]+[\']?[A-z]+$/', $src);
}
function reportValidation($src)
{
	return preg_match('/^(([A-z]*[\'?]?)[\s]?[A-z]*)*$/', $src);
}
function phoneValidation($src)
{
	return preg_match('/[+1][\s](\(\d{3}\)[\s ])(\d{3}[\-]\d{4})/', $src);
}
function emailValidation($src)
{
	return preg_match('/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/', $src);
}
function dateValidation($src)
{
	return preg_match('/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/', $src);
}
