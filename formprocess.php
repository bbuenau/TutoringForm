<?php
$host = '127.0.0.1';
$db   = 'dbname';
$user = 'dbuser';
$pass = '123';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new \PDO($dsn, $user, $pass, $opt);
$values = [
	':first_name' => $_POST['first_name'],
	':last_name' => $_POST['last_name'],
];
$stmt = $pdo->prepare("INSERT INTO Personal (first_name,last_name) VALUES (:first_name, :last_name)");
$stmt->execute($values);
?>
