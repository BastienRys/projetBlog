<?php
/* Smarty version 3.1.33, created on 2019-02-11 14:57:36
  from '/var/www/html/theBlog (copie)/templates/supprimer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c617f501013a3_09956002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '312b374037d4e4582c1c7812535b0eaaec16c0c6' => 
    array (
      0 => '/var/www/html/theBlog (copie)/templates/supprimer.tpl',
      1 => 1547222502,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c617f501013a3_09956002 (Smarty_Internal_Template $_smarty_tpl) {
?>			<!-- *************** FORMULAIRE *************** -->
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
              <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == FALSE) {?>

                <h3>T'as pas le droit de faire ça, toi !</h3>

              <!-- Sinon afficher le bouton pour supprimer -->
              <?php } else { ?>

                <!-- Champ caché pour passer l'id de l'article dans le POST -->
                <input id="id" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                <!-- Bouton pour envoyer le formulaire de suppression -->
                <button class="btn btn-danger btn-lg" type="submit" name="submit" value="">Supprimer l'article</button>
              <?php }?>

						</form>

						<a href="index.php" class="btn btn-secondary btn-lg margin-top">Annuler</a>
					</div>
				</div>
			</div>
<?php }
}
