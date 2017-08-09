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

//validation
if (!isset($_POST["first_name"])){
	die("No first name");
}
if (!isset($_POST["last_name"])){
	die("No last name");
	
}if (!isset($_POST["grade"])){
	die("No grade");
}


//output what is in the last form submission
echo $_POST["time"][0]; 
var_dump ($_POST);
exit;



//inserting into database
$values = [
	':first_name' => $_POST['first_name'],
	':last_name' => $_POST['last_name'],
	':grade' => $_POST['grade'],
	':gender' => $_POST['gender'],
];
$stmt = $pdo->prepare("INSERT INTO people (first_name,last_name,grade,gender) VALUES (:first_name, :last_name, :grade, :gender)");
$stmt->execute($values);

//Get "id" of the new person
$pdo->exec($stmt);
$last_id = $conn->lastInsertId();
echo "New record created successfully. Last inherited ID is:" . $last_id;

