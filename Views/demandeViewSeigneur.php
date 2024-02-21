<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dime : Consultation des impots</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
      include 'header.php'
    ?>

    <div class="container">
    <h1>Historique des demandes </h1>
    <br/>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Demande #</th>
                <th scope="col">date</th>
                <th scope="col">Nom de la demande</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($demandes as $demande): ?>
                <tr>
                    <td>
                        <?php echo $demande['id']; ?>
                    </td>
                    <td>
                        <?php echo $demande['Date']; ?>
                    </td>
                    <td>
                        <?php echo $demande['name']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <?php
      include 'footer.php'
    ?>
</body>
</html>