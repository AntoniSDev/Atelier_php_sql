<?php

require_once("connect.php");

$sql = "SELECT * FROM stagiaire";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// <pre> = indentation 
//echo "<pre>";
//print_r($result);  or  var_dump
//echo "</pre>";

require_once('close.php');
?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>

</head>

<body>
	<h1>Stagiaires</h1>
	<table>
		<thead>
			<th>id</th>
			<th>first name</th>
			<th>last name</th>
			<th>actions</th>
		</thead>
		<tbody>
			<?php
			//foreach result de $result afficher une ligne dans le tableau 
			foreach ($result as $stagiaire) {
			?>
				<tr>
					<td><?= $stagiaire["id"] ?></td>
					<td><?= $stagiaire["first_name"] ?></td>
					<td><?= $stagiaire["last_name"] ?></td>
					<td>
						<a href="stagiaire.php?id=<?= $stagiaire["id"] ?>">Show</a>
						<a href="delete.php?id=<?= $stagiaire["id"] ?>">Delete</a>
						<a href="edit.php?id=<?= $stagiaire["id"] ?>">Edit</a>
					</td>
				</tr>

			<?php
			}
			?>



		</tbody>
		
	</table>
	
	
	
	<a href="add.php">Add Stagiaire</a>
</body>

</html>