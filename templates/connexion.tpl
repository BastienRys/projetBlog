	<div class="container">

		<div class="row">
			<div class="col-lg-12 text-center"> 

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

			</div>
		  <div class="col-lg-12 text-center">
				<h1 class="mt-5">Connexion</h1>
		  </div>
		</div>

		<div class="row">
		  <div class="col-lg-4 text-center center">

				<!-- FORMULAIRE AJOUT UTILISATEUR -->
				<form id="form_article" action="connexion.php" method="post" enctype="multipart/form-data">

				  <!-- EMAIL -->
				  <div class="form-group">
					<label class="col-form-label" for="email">E-mail</label>
					<input id="email" class="form-control" type="text" name="email" placeholder="email@email.fr" value="" required>
				  </div>

				  <!-- MOT DE PASSE -->
				  <div class="form-group">
					<label class="col-form-label" for="mdp">Mot de passe</label>
					<input id="mdp" class="form-control" type="password" name="mdp" placeholder="Mot de passe" value="" required>
				  </div>

				  <!-- BOUTTON -->
				  <button class="btn btn-primary" type="submit" name="submit" valeur="ajouter">Se connecter</button>

				</form>

		  </div>
		</div>
	</div>