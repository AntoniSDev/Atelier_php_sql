<?php
// submit = something in $_post
if ($_POST) {

	//check if fields not empty
	if (isset($_POST['first_name'])
		&& (isset($_POST['last_name']))
	) {
		// test des données 
	  // var_dump($_POST['first_name']);
		//connect db
		require_once('connect.php');
		//sql inject protection
		$first_name = strip_tags($_POST['first_name']);
		$last_name = strip_tags($_POST['last_name']);
		//insert data in table
			//stock request
		$sql = "INSERT INTO stagiaire (first_name, last_name) VALUES (:first_name, :last_name)";
		$query = $db->prepare($sql);
			//PDO PARAM check if is string (but default is already STR)
		$query->bindValue(":first_name", $first_name, PDO::PARAM_STR);
		$query->bindValue(":last_name", $last_name);
		$query->execute();
		require_once('close.php');
		header("location: index.php");

	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Add</title>
</head>

<body>
	<h1>Add stagiaire</h1>
	<form method="post">
		<div>
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" required>
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" required>
			<input type="submit" value="send"></input>
		</div>
	</form>
</body>

</html>