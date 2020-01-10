<?php
//namespace beHop\database;
//public static function getConnection()
//{
$dbName = 'behop';
$dns = 'mysql:dbname='.$dbName.';host=localhost';
$dbuser = 'root';
$dbpassword = '';
$options    = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


$database = null;

try
{
    $database = new PDO($dns, $dbuser, $dbpassword, $options);
    $database->exec("SET CHARACTER SET utf8");
}
catch(\PDOException $e)
{
	die( 'Database connection failed: ' . $e->getMessage() );
} 
//}
echo "Hello World";
?>