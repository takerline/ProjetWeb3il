





<?php
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

            session_start();
            session_unset(); 
            session_destroy(); 
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
    

        require_once 'views/loginView.php';
}
