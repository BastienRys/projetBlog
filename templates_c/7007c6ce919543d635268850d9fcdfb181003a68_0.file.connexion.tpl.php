<?php
/* Smarty version 3.1.33, created on 2019-01-11 15:28:53
  from '/var/www/html/theBlog/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c38a825d19fd0_46745516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7007c6ce919543d635268850d9fcdfb181003a68' => 
    array (
      0 => '/var/www/html/theBlog/templates/connexion.tpl',
      1 => 1547216932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c38a825d19fd0_46745516 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">

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
