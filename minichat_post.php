<?php

 // Login to the database
$pseudo = addslashes(strip_tags($_POST['pseudo']));
$message = addslashes(strip_tags($_POST['message']));

include("../password1/password.php");
try {

  $bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8', 'root', $password);

} catch (Exception $e) {

  die('Erreur : ' . $e->getMessage());

}


// Inserting the message using a prepared query
if (!empty($pseudo) and !empty($message)) {
 // $bdd->exec("INSERT INTO minichat (pseudo, message) VALUES('$pseudo','$message')");
  $req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES (:pseudo, :message )');
  $req->execute(array(
    'pseudo' => $pseudo,
    'message' => $message
  ));
}

  // Redirecting the visitor to the minichat page
header('Location: minichat.php');





?>
