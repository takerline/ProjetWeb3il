<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour du Bien</title>
</head>
<body>
    <h1>Mise à jour du Bien</h1>
    <?php echo $bien['blé']; ?>
    <form action="index.php?action=updateBien" method="post">
       
        <label for="blé">blé:</label>
        <input type="number" id="blé" name="blé" value="<?php echo htmlspecialchars($bien['blé']); ?>" required>
        <label for="denier">denier:</label>
        <input type="number" id="denier" name="denier" value="<?php echo $bien['denier']; ?>" required>
        <!-- Ajoutez d'autres champs comme nécessaire -->
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
