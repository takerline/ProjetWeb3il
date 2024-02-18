<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consulter les impots à payer</title>
</head>
<body>
    <h1>Demandes de Biedns</h1>
    <ul>
        <?php foreach ($demandes as $demande): ?>
            <li><?php echo $demande['Date']; ?>
                Demande #<?php echo $demande['id']; ?> - <?php echo $demande['name']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
