<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dime : Consulter les impots à payer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>



    <?php
      include 'header.php'
    ?>

    <div class="container">
    <h1>Accueil</h1>
    <br/>
    <?php if (!empty($demandes)): ?>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Payé</th>                    
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandes as $demande): ?>
                    <tr>
                        <td>
                            <?php echo $demande['id']; ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($demande['name']); ?>
                        </td>
                        <td>
                            <?php 
                            if ($demande['impotPaye']){
                                ?> <img src="Assets/Images/check.png" alt="logo" width="30" height="30"> <?php
                            }else {
                                ?> <img src="Assets/Images/cross.png" alt="logo" width="30" height="30"> <?php
                            }
                            ?>
                        </td>
                        <td>
                            <form method="post" action="index.php?action=repondreDemande&demandeId=<?php echo $demande['id']; ?>">
                                <button type="submit">Payer cet Impôt</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>Aucun bien trouvé.</p>
            <a class="btn btn-primary" href="index.php?action=editBienForm">Créer une liste de biens</a>
        <?php endif; ?>




    </div>
    <?php
      include 'footer.php'
    ?>
</body>
</html>
