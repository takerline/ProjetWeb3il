<!-- views/menuView.php -->

<?php if (!isset($_SESSION['username'])): header("Location: index.php"); ?>
   
    
<?php endif; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu des Biens</title>
</head>
<body>
    <h1>Liste de vos biens</h1>
    <?php if (!empty($biens)): ?>
        <ul>
            <?php foreach ($biens as $bien): ?>
                <li>
                    <?php echo htmlspecialchars($bien['blé']) . ' ... ' . htmlspecialchars($bien['denier']); ?> 
                    <!-- Ajoutez d'autres détails de $bien comme nécessaire -->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun bien trouvé.</p>
    <?php endif; ?>
    <a href="index.php?action=editBienForm">Declarer mes nouveaux biens</a>
</body>
</html>

