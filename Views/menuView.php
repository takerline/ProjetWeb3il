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


<?php
if (isset($_SESSION['role'])) {
    echo "<p>Rôle : " . htmlspecialchars($_SESSION['role']) . "</p>";
    // Afficher des éléments spécifiques basés sur le rôle
    if ($_SESSION['role'] == 'clerge') {



        
        // Afficher des informations spécifiques au clergé
    } elseif ($_SESSION['role'] == 'seigneur') {
        ?><a href="index.php?action=SshowDemandes">Mes impots</a><?php
        // Afficher des informations spécifiques aux seigneurs
    } elseif ($_SESSION['role'] == 'tieretat') {
        ?><a href="index.php?action=showDemandes">Mes impots</a><?php
        // Afficher des informations spécifiques au tiers état
    }
}
?>




<p>Bienvenue, <?php echo htmlspecialchars($_SESSION['userId']); ?>!</p>

    
    <h1>Menu Principal</h1>
    <p><?php echo $_SESSION['userId']; ?></p>
    <ul>
        <li><a href="index.php?action=compte">Mon Domaine ( mon compte)</a></li>
        <li><a href="index.php?action=page2">Page 2</a></li>
        <li><a href="index.php?action=logout">Déconnexion</a></li>
    </ul>
</body>
</html>
