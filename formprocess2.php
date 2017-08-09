

<?php 
//use special chars for security
	echo htmlspecialchars($_SERVER["PHP_SELF"]);
?>

<?php
// define variables and set to empty values
$first_name = $last_name = $grade = $gender = "";
$genderErr = "";

//get the personal info from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $first_name = test_input($_POST["first_name"]);
  $last_name = test_input($_POST["last_name"]);
  $grade = test_input($_POST["grade"]);
  if (empty($_POST["gender"])) {
    $genderErr = "";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
}

//get the class info as an array


// clean the data
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<?php
// display the data that has been typed into the form
echo "<h2>Your Input:</h2>";
echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $grade;
echo "<br>";
echo $gender;
?>








