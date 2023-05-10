<?php

if ($_POST) {
  if (
    isset($_POST['id']) &&
    isset($_POST['first_name']) &&
    isset($_POST['last_name'])
  ) {
    require_once('connect.php');
    $id = strip_tags($_POST['id']);
    $first_name = strip_tags($_POST['first_name']);
    $last_name = strip_tags($_POST['last_name']);
    // update tabla name set
    $sql = "UPDATE stagiaire SET first_name=:first_name, last_name=:last_name WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->bindValue(':first_name',$first_name);
    $query->bindValue(':last_name',$last_name);
    $query->execute();
    require_once('close.php');
    header('Location: index.php');


  }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {

  require_once("connect.php");

  //remove special characters
  $id = strip_tags($_GET['id']);

  //select all from stagiare where is the url 
  $sql = "SELECT * FROM stagiaire WHERE id = :id";
  $query = $db->prepare($sql);

  //check if 'int' in id
  $query->bindValue(":id", $id, PDO::PARAM_INT);

  $query->execute();
  $result = $query->fetch();
  require_once('close.php');
} else {

  header('Location: index.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Edit</title>
</head>

<body>
  <h1>Edit stagiaire <?= $result["first_name"] . " " . $result["last_name"] ?></h1>
  <form method="post">
    <div>
      <label for="first_name">First Name</label>
      <input type="text" name="first_name" value="<?= $result["first_name"] ?>" required>
      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" value="<?= $result["last_name"] ?>" required>
      <input type="hidden" name="id" value="<?= $result["id"]?>">
      <input type="submit" value="Edit Stagiaire"></input>
    </div>
  </form>
</body>

</html>