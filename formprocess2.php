
<?php 

//PDO stuff
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


//use special chars for min level security
	echo htmlspecialchars($_SERVER["PHP_SELF"]);

// define variables and set to empty values
$first_name = $last_name = $grade = $gender = "";
$genderErr = "";

//get the personal info from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
//	echo "<pre>";
//	print_r ($_POST);
  $first_name = test_input($_POST["first_name"]);
  $last_name = test_input($_POST["last_name"]);
  $grade = test_input($_POST["grade"]);
  if (empty($_POST["gender"])) 
  {
    $genderErr = "";
  } else 
  {
    $gender = test_input($_POST["gender"]);
  }
}

// clean the data
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// display the data that has been typed into the form
echo "<h2>Your Input:</h2>";
echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $grade;
echo "<br>";
echo $gender;

/*inserting into database
$values = 
[
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
*/









