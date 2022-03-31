<?php
$connection=mysqli_connect("localhost","root","","cardb");
$mysql =  new mysqli('localhost','root','','cardb');
session_start();

$page = explode('.', (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])))[0];

function isAuthUser()
{
	return isset($_SESSION['auth']) ? true : false;
}

function isUnAthPage($page) //array
{
	$unauth_pages = ['cart', 'addtocart', 'checkout'];

	return in_array($page, $unauth_pages) ? true : false;

}



?>