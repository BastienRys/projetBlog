    <nav class="navbar navbar-expand-lg navbar-dark py-3 bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Mon super Blog COOL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>

              <?php

                // Si pas de connexion en cours ne pas afficher les boutons 'utilisateurs' et 'articles'
                if($is_connect == FALSE) {

                  echo '';

                  // Sinon afficher ces boutons
                } else {

                  echo '<li class="nav-item">
                          <a class="nav-link" href="article.php?modif=0">Articles</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="utilisateurs.php">Utilisateurs</a>
                        </li>';
                }

              ?>

            <li class="nav-item">

              <?php 

                // Si pas de connexion en cours afficher connexion
                if($is_connect == FALSE) {

                  echo '<a class="nav-link" href="connexion.php">Connexion</a>';

                  // Sinon afficher deconnexion
                } else {

                  echo '<a class="nav-link" href="deconnexion.php">Deconnexion</a>';

                }

              ?>

            </li>
          </ul>
        </div>
      </div>
    </nav>
