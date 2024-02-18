





<?php
// index.php
session_start();
require_once 'config/database.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/MenuController.php';
require_once 'controllers/CompteController.php';
require_once 'controllers/BienController.php';
require_once 'controllers/DemandeController.php';
require_once 'controllers/DemandeControllerSeigneur.php';

$action = $_GET['action'] ?? '';
$Bcontroller = new BienController($pdo);
$demandeController = new DemandeController($pdo);
$SdemandeController = new DemandeControllerSeigneur($pdo);
switch ($action) {
    case 'login':
        $controller = new LoginController($pdo);
        $controller->login();
        break;
    case 'showMenu':
          $controller = new MenuController();
          $controller->showMenu();
          break;
    case 'logout':
            // Détruire la session et rediriger vers la page de connexion
            session_start();
            session_unset(); // Supprime toutes les variables de session
            session_destroy(); // Détruit la session
            header("Location: index.php");
            exit;
    case 'compte':
      $controller = new CompteController($pdo);
      $controller->showPage();
      break;
    case 'editBienForm':
    
       
        $Bcontroller->editBienForm();
        
        break;
    case 'updateBien':
     
      $Bcontroller->updateBien();
        break;

    case 'showDemandes':
          $demandeController->showDemandes();
          break;
    case 'repondreDemande':
        echo "ok";
          $demandeId = $_GET['demandeId'] ?? null;
          if ($demandeId) {
              $demandeController->repondreDemande($demandeId);
          }
          break;
    case 'SshowDemandes':
      $SdemandeController->showDemandes();
      break;



    default:
    
        // Afficher la vue de connexion par défaut
        require_once 'views/loginView.php';
}





/*
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dime : connexion </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Connexion à votre espace</span>
      </a>

    </header>


  
    <div class="container">

      <form class="needs-validation" action="controller/LoginController.php" novalidate="" method="POST">
          <div class="row g-3">

            <div class="col-12">
              <label for="username" class="form-label">Identifiant</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="username" placeholder="Identifiant" required="">
                <div class="invalid-feedback">
                  Votre identifiant est nécessaire
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Mot de passe </label>
              <input type="password" class="form-control" id="password" placeholder="Mot de passe">
              <div class="invalid-feedback">
                Veuillez entrer votre mot de passe
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Se connecter</button>
        </form>
    </div>
	
	
	
	
	
	
    <?php
      include 'Views\footer.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>*/