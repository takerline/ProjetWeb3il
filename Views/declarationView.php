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
    <h1>Mise à jour des biens</h1>
    <br/>
    
    <form action="index.php?action=updateBien" method="POST">
        <div class="row g-3">

            <div class="col-12">
                <label for="blé" class="form-label">blé :</label>
                <input type="number" id="blé" name="blé" value="<?php echo $bien['blé']; ?>" required>
            </div>

            <div class="col-12">
                <label for="denier" class="form-label">deniers :</label>
                <input type="number" id="denier" name="denier" value="<?php echo $bien['denier']; ?>" required>
            </div>

            <div class="col-12">
                <label for="betail" class="form-label">bétail :</label>
                <input type="number" id="betail" name="betail" value="<?php echo $bien['betail']; ?>" required>
            </div>

            <div class="col-12">
                <label for="arme" class="form-label">armes :</label>
                <input type="number" id="arme" name="arme" value="<?php echo $bien['arme']; ?>" required>
            </div>

            <div class="col-12">
                <label for="cheval" class="form-label">chevaux :</label>
                <input type="number" id="cheval" name="cheval" value="<?php echo $bien['cheval']; ?>" required>
            </div>

            <div class="col-12">
                <label for="sel" class="form-label">sel :</label>
                <input type="number" id="sel" name="sel" value="<?php echo $bien['sel']; ?>" required>
            </div>

        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Confirmer</button>
    </form>
    </div>

    <?php
      include 'footer.php'
    ?>
</body>
</html>

