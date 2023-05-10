<?php 

// try {} show error $e avec catch
// new PDO : create newe PDO 

try{
    $server_name = "localhost";
    $db_name = "formation";
    $user_name = "root";
    $password = "";

    $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8mb4", "$user_name", "$password");
 //   echo "Connexion réussie😒";
}catch(PDOException $e){
    echo "Echec de connexion:" . " " . $e->getMessage();
};

?>