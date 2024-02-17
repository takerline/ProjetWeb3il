<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consulter les impots à payer</title>
</head>
<body>
    <h1>Demandes de Biens</h1>
    <ul>
        <?php foreach ($demandes as $demande): ?>
            <li>
                Demande #<?php echo $demande['id']; ?> - <?php echo $demande['name']; ?>
                <form method="post" action="index.php?action=repondreDemande&demandeId=<?php echo $demande['id']; ?>">
                    <button type="submit">Répondre à la demande</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
