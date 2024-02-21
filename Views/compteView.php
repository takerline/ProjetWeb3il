<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dime : Listage des biens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <?php
      include 'header.php'
    ?>

    <div class="container">
        <h1>Liste de vos biens</h1>
        <br/>
        <h2>Vous trouverez ici le recensement de vos biens. </h2>
        <br/>

        <?php if (!empty($biens)): ?>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Blé</th>
                    <th scope="col">Deniers</th>
                    <th scope="col">Bétail</th>
                    <th scope="col">Armes</th>
                    <th scope="col">Chevaux</th>
                    <th scope="col">Sel</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($biens as $bien): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($bien['blé']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($bien['denier']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($bien['betail']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($bien['arme']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($bien['cheval']); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($bien['sel']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>Aucun bien trouvé.</p>
            <a class="btn btn-primary" href="index.php?action=editBienForm">Créer une liste de biens</a>
        <?php endif; ?>

        <br/>
        
        <a class="btn btn-primary" href="index.php?action=editBienForm">Rectifier la liste biens</a>

        <br/>
    </div>

    <?php
      include 'footer.php'
    ?>
</body>
</html>