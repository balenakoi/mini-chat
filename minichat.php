<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  <body>
 <form  action="minichat_post.php" method="post">
  <label for="pseudo">Pseudo : </lable> <input type="text" name="pseudo" ><br>
  <label for="message">Message : </label><input type="text" name="message"  ></br>
  <input  type="submit" value="Envoyer">
 </form>


<?php
 // <!-- Login to the database -->

try {
  $bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8', 'root', '');

} catch (Exception $e) {
        die('Erruer : '.$e->getMessage());

}

  // <!-- Retrieve the last 10 messages -->
  $reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0,10');


  // <!-- Display of each message (all data is protected by htmlspecialchars) -->

  while ($donnees = $reponse->fetch()) {
    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']).  '</strong>  : ' . htmlspecialchars($donnees['message']) . '</p>';
  }

 $reponse->closecursor();

  ?>
  </body>
</html>
