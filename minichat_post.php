<?php

 // Login to the database
$pseudo = addslashes($_POST['pseudo']);
$message = addslashes( $_POST['message']);

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8', 'root', 'w');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}


// Inserting the message using a prepared query
if(!empty($pseudo) AND !empty($message)){
 $bdd->exec("INSERT INTO minichat (pseudo, message) VALUES('$pseudo','$message')");

}

  // Redirecting the visitor to the minichat page
  header('Location: minichat.php');





?>
