
<?php 
/*to build the people table --from W3Schools PHP SELECT Data display as table
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Grade</th><th>Gender</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
*/

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
echo "<br>";

//inserting values into database
$values = 
[
	':first_name' => $first_name,
	':last_name' => $last_name,
	':grade' => $grade,
	':gender' => $gender,
];
$stmt = $pdo->prepare("INSERT INTO people (first_name,last_name,grade,gender) VALUES (:first_name, :last_name, :grade, :gender)");
$stmt->execute($values);

//Get "id" of the new person
//$pdo->exec($stmt);
$last_id = $pdo->lastInsertId();
echo "New record created successfully. Last inherited ID is:" . $last_id;

//join classes and people to people_classes table
foreach ($_POST['class'] AS $class)
{
	$values = 
[
	':fkperson_id' => $last_id,
	':fkclass_id' => $class,
	
];
$stmt = $pdo->prepare("INSERT INTO people_classes (fkperson_id,fkclass_id) VALUES (:fkperson_id, :fkclass_id)");
$stmt->execute($values);
}

//join for table times_lengths

foreach ($_POST['time'] AS $time)
{
	$value = 
	[
		':fktimes_id' => $time,
		':fklengths_id' => $length,
	];
$stmt = $pdo->prepare("INSERT INTO times_legths (fktimes_id,fklengths_id) VALUES (:fktimes_id,fklengths_id)");
}




/*from W3Schools PHP SELECT Data display as table
try
{
	$stmt = $pdo->prepare("SELECT id, first_name, last_name, grade, gender FROM people"); 
	$stmt->execute();

		// set the resulting array to associative
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) 
	{ 
	   echo $v;
	}
}
catch(PDOException $e) 
{
    echo "Error: " . $e->getMessage();
}
$pdo = null;
echo "</table>";
*/

