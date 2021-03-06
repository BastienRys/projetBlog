      <div class="container">

        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="mt-5">Ajouter un utilisateur</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 text-center center">

            <!-- FORMULAIRE AJOUT UTILISATEUR -->
            <form id="form_article" action="utilisateurs.php" method="post" enctype="multipart/form-data">
              
              <!-- NOM -->
              <div class="form-group">
                <label class="col-form-label" for="nom"><b>Nom</b></label>
                <input id="nom" class="form-control" type="text" name="nom" placeholder="Nom de l'utilisateur" value="" required>
              </div>

              <!-- PRENOM -->
              <div class="form-group">
                <label class="col-form-label" for="prenom"><b>Prénom</b></label>
                <input id="prenom" class="form-control" type="text" name="prenom" placeholder="Prénom de l'utilisateur" value="" required>
              </div>

              <!-- EMAIL -->
              <div class="form-group">
                <label class="col-form-label" for="email"><b>E-mail</b></label>
                <input id="email" class="form-control" type="text" name="email" placeholder="E-mail de l'utilisateur" value="" required>
              </div>

              <!-- MOT DE PASSE -->
              <div class="form-group">
                <label class="col-form-label" for="mdp"><b>Mot de passe</b></label>
                <input id="mdp" class="form-control" type="password" name="mdp" placeholder="Mot de passe de l'utilisateur" value="" required>
              </div>

              <!-- VERIFICATION MOT DE PASSE -->
              <div class="form-group">
                <label class="col-form-label" for="mdpverif"><b>Vérification mot de passe</b></label>
                <input id="mdpverif" class="form-control" type="password" name="mdpverif" placeholder="Indiquez le mot de passe une seconde fois" value="" required>
              </div>

              <!-- BOUTTON -->
              <button class="btn btn-primary margin-bot" type="submit" name="submit" valeur="ajouter"><b>Ajouter l'utilisateur</b></button>

            </form>

          </div>
        </div>

      </div>