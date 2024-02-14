<!-- views/menuView.php -->


<?php if (!isset($_SESSION['username'])): header("Location: index.php"); ?>
   
    
<?php endif; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
</head>
<body>
<p>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

    
    <h1>Menu Principal</h1>
    <ul>
        <li><a href="index.php?action=page1">Page 1</a></li>
        <li><a href="index.php?action=page2">Page 2</a></li>
        <li><a href="index.php?action=logout">Déconnexion</a></li>
    </ul>
</body>
</html>
