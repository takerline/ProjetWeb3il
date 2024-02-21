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

      <form class="needs-validation" action="index.php?action=login" novalidate="" method="POST">
          <div class="row g-3">

            <div class="col-12">
              <label for="username" class="form-label">Identifiant</label>
              <div class="input-group has-validation">
              
                <input type="text" class="form-control" name="username" id="username" placeholder="Identifiant" required="">
                <div class="invalid-feedback">
                  Votre identifiant est nécessaire
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Mot de passe </label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
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
      include 'footer.php'
    ?>
  </body>
</html>
