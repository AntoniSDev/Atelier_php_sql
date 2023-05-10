<?php 

if (isset($_GET['id']) && !empty($_GET['id'])){

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
    }else{

        header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
      <?= $result["first_name"] . " " . $result["last_name"] ?>
    </h1>
</body>
</html>