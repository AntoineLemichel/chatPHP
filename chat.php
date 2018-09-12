<?php
include("db.php");
if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['message'])){
  $req = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(:pseudo, :message)');

  $req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'message' => $_POST['message']
  ));
  header('Location: index.php');

} else {
  echo "Tous les champs sont requis.";
}



 ?>
