<?php
/* Smarty version 3.1.33, created on 2019-01-11 16:28:08
  from '/var/www/html/theBlog/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c38b60855a5f4_83818441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edd9aaac5650497d414314028464527dab241b76' => 
    array (
      0 => '/var/www/html/theBlog/templates/article.tpl',
      1 => 1547220386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c38b60855a5f4_83818441 (Smarty_Internal_Template $_smarty_tpl) {
?>			<!-- *************** FORMULAIRE *************** -->
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
								<?php if ($_smarty_tpl->tpl_vars['modif']->value == 1) {?>

									<!-- TITRE -->
									<div class="form-group">
										<label class="col-form-label" for="titre">Titre</label>
										<input id="titre" class="form-control" type="text" name="titre" placeholder="Titre de votre article" value="<?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
" required>
									</div>

									<!-- TEXTE -->
									<div class="form-group">
										<label for="texte">Texte</label>
										<textarea rows="8" id="texte" class="form-control" name="texte" rows="3" required><?php echo $_smarty_tpl->tpl_vars['texte']->value;?>
</textarea>
									</div>

									<!-- PUBLIE -->
									<!-- Si l'article est publié on check la box -->
									<?php if ($_smarty_tpl->tpl_vars['publie']->value == 1) {?>

										<div class="form-group">
											<div>
												<label class="form-check-label" for="publie">
													<input id="publie" class="form-check-input" type="checkbox" name="publie" value="1" checked> Publier ?
												</label>
											</div>
										</div>';

									<!-- Sinon on laisse la box unchecked -->
									<?php } else { ?>

										<div class="form-group">
											<div>
												<label class="form-check-label" for="publie">
													<input id="publie" class="form-check-input" type="checkbox" name="publie" value="1"> Publier ?
												</label>
											</div>
										</div>';

									<?php }?>

									<!-- BOUTON -->
									<!-- champ caché pour passer l'id de l'article dans le POST -->
									<input id="id" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
									<!-- value = 2 (modifier) -->
									<button class="btn btn-primary" type="submit" name="submit" value="2">Modifier l\'article</button>

								<!-- S'il s'agit d'un ajout d'article (modif == 0) -->
								<?php } else { ?>

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
									
								<?php }?>

						</form>
					</div>
				</div>
			</div><?php }
}
