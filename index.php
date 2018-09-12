<?php
include("db.php");
$pseudo = $_COOKIE['pseudo'];
 ?>
<!doctype html>
<html class="no-js" lang="fr-FR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TP: Mini-Chat</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/semantic.min.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <div class="ui container grid">
    <form action="chat.php" method="post" class="ui form">
      <div class="field required">
        <label>Pseudo :</label>
        <input type="text" name="pseudo" placeholder="Pseudo" required value="<?php echo $pseudo?>">
      </div>
      <div class="field required">
        <label>Message :</label>
        <textarea name="message" rows="8" cols="40" placeholder="Votre message" required></textarea>
      </div>
      <a href="index.php" class="ui button">Rafraichir la page</a>
      <input type="submit" name="envoyer" value="Envoyer" class="ui olive button">
    </form>
    <div class="five wide column">

    <?php
    // setcookie("pseudo", $pseudo, time() + 365*24*3600, null, null, false, true);
    $reponse = $bdd->query("SELECT * FROM chat ORDER BY id DESC LIMIT 10");

    while($donnees = $reponse->fetch()){
      echo "<strong>" .$donnees['pseudo'] . " : </strong>";
      echo $donnees['message'];
      echo "<br>";
    }

  $reponse->closeCursor();
     ?>
  </div>
</div>


  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/semantic.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
