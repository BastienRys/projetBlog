<?php
/* Smarty version 3.1.33, created on 2019-02-13 12:18:18
  from '/var/www/html/theBlog (copie)/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c63fcfa9a3be9_92255752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc06b9588c1b283ab714cf058fddb3e8a354cf16' => 
    array (
      0 => '/var/www/html/theBlog (copie)/templates/connexion.tpl',
      1 => 1550056696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c63fcfa9a3be9_92255752 (Smarty_Internal_Template $_smarty_tpl) {
?>	<div class="container">

		<div class="row">
			<div class="col-lg-12 text-center"> 

				<!-- Si il y a des variables de sessions relatives aux notifications -->
				<?php if (isset($_smarty_tpl->tpl_vars['session_var']->value['notifications'])) {?>

					<!-- On affiche un message d'alerte -->
					<div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['alert'];?>
 alert-dismissible fade show" role="alert">
					  
						<button class="close" type="button" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

						  <!-- Afichage du message de notification -->
						  <?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['message'];?>


					</div>

				<?php }?>

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
	</div><?php }
}
