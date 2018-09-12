<?php

 // Login to the database
$pseudo = addslashes(strip_tags($_POST['pseudo']));
$message = addslashes(strip_tags( $_POST['message']));

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8', 'root', '');

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
