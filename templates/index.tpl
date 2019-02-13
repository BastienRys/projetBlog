    <!-- Contenu de la page -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">Voici mon super site avec des articles COOL</h1>

          <!-- Si il y a des variables de sessions relatives aux notifications -->
          {if isset($session_var.notifications)}

            <!-- On affiche un message d'alerte -->
            <div class="alert alert-{$session_var.notifications.alert} alert-dismissible fade show" role="alert">
            
              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

              <!-- Afichage du message de notification -->
              {$session_var.notifications.message}

            </div>

          {/if}

          <!-- Si pas de connexion en cours ne pas afficher le message amical -->
          {if $is_connect == FALSE}

            <p class="lead">Bonjour, comment ça va ?</p>

          <!-- Sinon afficher le message amical -->
          {else}

            <p class="lead">Bonjour {$prenom_connect} {$nom_connect}, ça va ? :)</p>
          
          {/if}

          <!-- Formulaire de recherche -->
          <div class="row margin-top margin-bot">
            <form id="form_search" action="recherche.php" class="form-inline center" method="GET">
              <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Chercher un article..." aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
            </form>
          </div>

        </div>
      </div>

      <div class="row">

          <!-- Boucle pour afficher les articles sur la page -->
          {foreach $tab_articles as $value}

            <div class="row">
              <div class="col-md-7 center margin-top margin-bot">
                <div class="card border border-dark shadow">
                  <img class="card-img-top" src="img/{$value.id}.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{$value.titre}</h5>

                    <!-- Si publie = 0 on le notifie -->
                    {if $value.publie == 0}

                      <p class="card-text"><i><u>Article non publié - Vous seul pouvez le voir</u></i></p>

                    {/if}

                    <p class="card-text">{$value.texte}</p>
                    <p class="card-text"><b>{$value.date_fr}</b></p>

                    <!-- Si pas de connexion en cours ne pas afficher le bouton pour modifier -->
                    {if $is_connect == false}

                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="voir.php?id={$value.id}" class="btn btn-success">Voir l'article</a>
                      </div>

                    <!-- Sinon afficher le bouton pour modifier / supprimer -->
                    {else}

                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="voir.php?id={$value.id}" class="btn btn-success">Voir l'article</a>
                        <a href="article.php?modif=1&id={$value.id}" class="btn btn-primary">Modifier l'article</a>
                        <a href="supprimer.php?id={$value.id}" class="btn btn-warning">Supprimer l'article</a>
                      </div>

                    {/if}

                  </div>
                </div>
              </div>
            </div>

          {/foreach}

      </div>

      <!-- Affichage du truc de pagination -->
      <div class="row">
        <nav class="mx-auto margin-top">
          <ul class="pagination pagination-lg border border-dark">

            <!-- Boucle allant de 1 à nombre de pages à afficher -->
            {for $i=1 to $nb_pages}

              <!-- Test pour mettre en surbrillance la page actuelle -->
              {if isset($page) && ($page == $i)}

                <li class="page-item active"><a class="page-link" href="index.php?page={$i}">{$i}</a></li>

              {else}

                <li class="page-item"><a class="page-link" href="index.php?page={$i}">{$i}</a></li>

              {/if}

            {/for}

          </ul>
        </nav>
      </div>

    </div> 
    <!-- Fin contenu de la page -->