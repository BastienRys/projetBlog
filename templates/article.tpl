			<!-- *************** FORMULAIRE *************** -->
			<div class="container">

				<div class="row">
					<div class="col-lg-12 text-center">
						<h1 class="mt-5">Ajouter un article</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 text-center center">

						<!-- FORMULAIRE AJOUT ARTICLE -->
						<form id="form_article" action="article.php?modif=0" method="post" enctype="multipart/form-data"> 

								<!-- S'il s'agit d'une modification d'article -->
								{if $modif == 1}

									<!-- TITRE -->
									<div class="form-group">
										<label class="col-form-label" for="titre">Titre</label>
										<input id="titre" class="form-control" type="text" name="titre" placeholder="Titre de votre article" value="{$titre}" required>
									</div>

									<!-- TEXTE -->
									<div class="form-group">
										<label for="texte">Texte</label>
										<textarea rows="8" id="texte" class="form-control" name="texte" rows="3" required>{$texte}</textarea>
									</div>

									<!-- PUBLIE -->
									<!-- Si l'article est publié on check la box -->
									{if $publie == 1}

										<div class="form-group">
											<div>
												<label class="form-check-label" for="publie">
													<input id="publie" class="form-check-input" type="checkbox" name="publie" value="1" checked> Publier ?
												</label>
											</div>
										</div>';

									<!-- Sinon on laisse la box unchecked -->
									{else}

										<div class="form-group">
											<div>
												<label class="form-check-label" for="publie">
													<input id="publie" class="form-check-input" type="checkbox" name="publie" value="1"> Publier ?
												</label>
											</div>
										</div>';

									{/if}

									<!-- BOUTON -->
									<!-- champ caché pour passer l'id de l'article dans le POST -->
									<input id="id" type="hidden" name="id" value="{$id}">
									<!-- value = 2 (modifier) -->
									<button class="btn btn-primary" type="submit" name="submit" value="2">Modifier l\'article</button>

								<!-- S'il s'agit d'un ajout d'article (modif == 0) -->
								{else}

									<!-- TITRE -->
									<div class="form-group">
										<label class="col-form-label" for="titre">Titre</label>
										<input id="titre" class="form-control" type="text" name="titre" placeholder="Titre de votre article" value="" required>
									</div>

									<!-- TEXTE -->
									<div class="form-group">
										<label for="texte">Texte</label>
										<textarea id="texte" class="form-control" name="texte" rows="3" required></textarea>
									</div>

									<!-- FICHIER-->
									<div class="form-group">
										<div class="custom-file">
											<input id="image" class="custom-file-input" type="file" name="image">
											<label class="custom-file-label" for="image">Choisir un fichier</label>
										</div>
									</div>'

									<!-- PUBLIE -->
									<div class="form-group">
										<div>
											<label class="form-check-label" for="publie">
												<input id="publie" class="form-check-input" type="checkbox" name="publie" value="1"> Publier ?
											</label>
										</div>
									</div>

									<!-- BOUTON -->
									<button class="btn btn-primary" type="submit" name="submit" value="1">Ajouter l'article</button>
									
								{/if}

						</form>
					</div>
				</div>
			</div>