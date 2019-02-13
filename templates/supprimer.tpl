			<!-- *************** FORMULAIRE *************** -->
			<div class="container">

				<div class="row">
					<div class="col-lg-12 text-center">
						<h1 class="mt-5">Supprimer un article</h1>
						<p><b>Êtes-vous certain(e) de vouloir supprimer l'article ?</b></p>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 text-center center">

						<!-- FORMULAIRE SUPPR ARTICLE -->
						<form id="form_article" action="supprimer.php" method="post" enctype="multipart/form-data">

							<!-- Si pas de connexion en cours ne pas afficher le bouton pour supprimer -->
              {if $is_connect == FALSE}

                <h3>T'as pas le droit de faire ça, toi !</h3>

              <!-- Sinon afficher le bouton pour supprimer -->
              {else}

                <!-- Champ caché pour passer l'id de l'article dans le POST -->
                <input id="id" type="hidden" name="id" value="{$id}">
                <!-- Bouton pour envoyer le formulaire de suppression -->
                <button class="btn btn-danger btn-lg" type="submit" name="submit" value="">Supprimer l'article</button>
              {/if}

						</form>

						<a href="index.php" class="btn btn-secondary btn-lg margin-top">Annuler</a>
					</div>
				</div>
			</div>
