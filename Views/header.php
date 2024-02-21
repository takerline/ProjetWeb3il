<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
      <a href="index.php?action=showMenu" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img src="Assets/Images/logo.png" alt="logo" width="50" height="50">
      </a>
    </div>

    

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

    
      <li><a href="index.php?action=showMenu" class="nav-link px-2 link-secondary">Accueil</a></li>
      <?php
        if (!isset($_SESSION['username'])) {
          header("Location: index.php");
        } 
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'clerge') {
              ?><li><a class="nav-link px-2" href="index.php?action=SshowDemandes"> Mes impots </a></li><?php
            } 
            elseif ($_SESSION['role'] == 'seigneur') {
              ?>
              <li><a class="nav-link px-2" href="index.php?action=SshowDemandes"> Mes impots </a></li>
              <li><a class="nav-link px-2" href="index.php?action=compte"> Mon Domaine </a></li>
              <?php
            } 
            elseif ($_SESSION['role'] == 'tieretat') {
              ?><li><a class="nav-link px-2" href="index.php?action=showDemandes">Mes impots </a></li><?php
            }
        } 
          ?>
        </ul>

        <div class="col-md-3 text-end">
          <button type="button" class="btn btn-outline-primary me-2">
          <a class="nav-link px-2" href="index.php?action=logout">Déconnexion</a>
          </button>
        </div>
  </header>
</div>

<link rel="icon" href="Assets/Images/logo.png" type="image/icon type">

<style>

  body {
    <?php
      if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'clerge') {
          ?>background-image: url('Assets/Images/fond_clerge.jpg');<?php
        } 
        elseif ($_SESSION['role'] == 'seigneur') {
          ?>background-image: url('Assets/Images/fond_seigneur.jpg');<?php
        } 
        elseif ($_SESSION['role'] == 'tieretat') {
          ?>background-image: url('Assets/Images/fond_tiers.jpg');<?php
        }
    } 
      ?>
    
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: rgba(255,255,255,0.7);
    background-blend-mode: lighten;
  }
</style>
