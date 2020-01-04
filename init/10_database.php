<?php


$dns = 'mysql:host=localhost;dbname=dwp-pdo';
$dbuser = 'root';
$dbpassword = 'root';
$options    = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


$database = null;

try
{
	$database = new PDO($dns, $dbuser, $dbpassword, $options);
}
catch(\PDOException $e)
{
	die( 'Database connection failed: ' . $e->getMessage() );
}