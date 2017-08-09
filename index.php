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

$classes = $pdo->query('SELECT * FROM classes')->fetchAll(PDO::FETCH_ASSOC);
$times = $pdo->query('SELECT * FROM times')->fetchAll(PDO::FETCH_ASSOC);
$lengths = $pdo->query('SELECT * FROM lengths')->fetchAll(PDO::FETCH_ASSOC);
$tutors = $pdo->query('SELECT * FROM tutors')->fetchAll(PDO::FETCH_ASSOC);
$payments = $pdo->query('SELECT * FROM payments')->fetchAll(PDO::FETCH_ASSOC);
?>
<!--form page -->
<!DOCTYPE html>
<html>
	<head>
		<title>Tutoring Request Form</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	
	<body>
		<h1>Tutoring Request Form</h1>
		<p>This form is to request help for math or CS classes at JCHS.</p>
		
		<form action="/formprocess2.php" method="post">
		 <div class="width">
			<fieldset>
				<legend> Personal Information: </legend>
				<span style="color:red;">* required field</span><br><br>
				First name: <span style="color:red;">*</span> <br>
				<input type="text" name="first_name" required> <br>
				Last name: <span style="color:red;">*</span><br>
				<input type="text" name="last_name" required> <br><br>
				Grade: <span style="color:red;">* </span><br>
				<select name="grade">
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select> <br><br>
				Gender: <br>
				<input type="radio" name="gender" value="Female">Female
				<input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Prefer not to say">Prefer not to say<br>
			</fieldset>
		 </div>
			<br>
		  <div class="width">
			<fieldset class="width">
				<legend>Class information</legend>
				What class do you need a tutor for? <br>
				<?php
				foreach ($classes AS $class)
				{
					echo '<input type="checkbox" name="class[]" value="'.$class["id"].'"> '.$class["name"].'<br>';
				}
				?>
			</fieldset>
		  </div>
			<br>
		  <div class="width">
			<fieldset>
				<legend>Times available</legend>
				When would you prefer to meet for tutoring? <br>
				<?php
				foreach ($times AS $time)
				{
					echo '<input type="checkbox" name="time[]" value="'.$time["id"].'"> '.$time["name"].'<br>';
				}
				?>
				<!-- <input type="checkbox" name="time[]" value="During"> During a free period at school<br>
				<input type="checkbox" name="time[]" value="Before"> Before school <br>
				<input type="checkbox" name="time[]" value="After"> After school<br>
				<input type="checkbox" name="time[]" value="Lunch"> During Lunch<br>
				<input type="checkbox" name="time[]" value="Weekend"> On the weekend<br>
				<input type="checkbox" name="time[]" value="Other"> Other -->
				<br><br>
				How often would you like to meet? <br>
				<?php
				foreach ($lengths AS $length)
				{
					echo '<input type="checkbox" name="length[]" value="'.$length["id"].'"> '.$length["name"].'<br>';
				}
				?>
				<!--<input type="checkbox" name="tlength[]" value="Once2"> Once a week for 2 hours or less<br>
				<input type="checkbox" name="tlength[]" value="Once4"> Once a week for 4+ hours<br>
				<input type="checkbox" name="tlength[]" value="Twice"> Two to three times a week for 2 hours or less<br>
				<input type="checkbox" name="tlength[]" value="Daily"> Every day for 1 hour or less<br>
				<input type="checkbox" name="tlength[]" value="Test"> Only the week before a test<br>
				<input type="checkbox" name="tlength[]" value="Other"> Other -->
				<br>
			</fieldset>
		  </div>
			<br>
		  <div class="width">
			<fieldset>
				<legend>Tutor specs</legend>
				What kind of tutor do you want? <br>
				<?php
				foreach ($tutors AS $tutor)
				{
					echo '<input type="checkbox" name="tutor[]" value="'.$tutor["id"].'"> '.$tutor["name"].'<br>';
				}
				?>
				<!--<input type="checkbox" name="tutortype[]" value="Teacher1"> JCHS teacher<br>
				<input type="checkbox" name="tutortype[]" value="Student1"> JCHS student<br>
				<input type="checkbox" name="tutortype[]" value="Teacher2"> Non-JCHS adult <br>
				<input type="checkbox" name="tutortype[]" value="Student2"> Non-JCHS student<br>
				<input type="checkbox" name="tutortype[]" value="Anyone"> Anyone!<br>
				<input type="checkbox" name="tutortype[]" value="Other"> Other -->
				<br><br>
				Are you willing/able to pay for a tutor? <br>
				<input type="radio" name="payment" value="Yes"> Yes<br>
				<input type="radio" name="payment" value="No"> No<br>
				<input type="radio" name="payment" value="Maybe"> Maybe <br>
				<input type="radio" name="payment" value="Other"> Other<br><br>
				How much are you willing/able to pay? (This may affect what kind of tutor you are able to get.)<br>
				<?php
				foreach ($payments AS $payment)
				{
					echo '<input type="checkbox" name="payment[]" value="'.$payment["id"].'"> '.$payment["name"].'<br>';
				}
				?>
				<!--<input type="checkbox" name="amount[]" value="High">$20+/hour<br>
				<input type="checkbox" name="amount[]" value="Low">Between $10 & $20/hour<br>
				<input type="checkbox" name="amount[]" value="Low">Between $1 & $10/hour<br>
				<input type="checkbox" name="amount[]" value="Alt"> I'm can trade tutoring in another subject<br>
				<input type="checkbox" name="amount[]" value="Other"> Other -->
				<br><br>	
			</fieldset>
		  </div>
		  <br>
		  <input type="submit" value="Submit" type="button" class="button">
		</form>
	</body>
</html>