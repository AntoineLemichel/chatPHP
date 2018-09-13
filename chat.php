<?php
include("db.php");
if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['message'])){
  setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
  $req = $bdd->prepare('INSERT INTO chat(pseudo, message, timedate) VALUES(:pseudo, :message, NOW())');

  $req->execute(array(
    'pseudo' => htmlspecialchars($_POST['pseudo']),
    'message' => $_POST['message'],
  ));
  header('Location: index.php');

} else {
  echo "Tous les champs sont requis.";
}



 ?>
