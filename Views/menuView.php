
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dime : Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>



    <?php
      include 'header.php'
    ?>

    <div class="container">
    <h1>Accueil</h1>
    <br/>
    <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?> !</h2>

    

    </div>
    <?php
      include 'footer.php'
    ?>
</body>
</html>
