<?php
/* Smarty version 3.1.33, created on 2019-02-13 12:09:18
  from '/var/www/html/theBlog (copie)/templates/recherche.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c63fade1e07f0_25409784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '942f25fb548b58cecb1ebd170cef5963e277488f' => 
    array (
      0 => '/var/www/html/theBlog (copie)/templates/recherche.tpl',
      1 => 1550055801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c63fade1e07f0_25409784 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div class="container">
			<div class="row">
		    <div class="col-lg-12">

          <h2 class="mt-5 text-center"><?php echo $_smarty_tpl->tpl_vars['nb_articles_search']->value;?>
 article(s) correspond(ent) à votre recherche</h2>

		    	<!-- Formulaire de recherche -->
          <div class="row margin-top margin-bot">
            <form id="form_search" action="recherche.php" class="form-inline center" method="GET">
              <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Chercher un article..." aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
            </form>
          </div>

		    	<!-- Boucle pour afficher les articles sur la page -->
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>

		        <div class="row">
		    		  <div class="col-md-7 center margin-top margin-bot">
                <div class="card border border-dark shadow">
                  <img class="card-img-top" src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.png" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h5>

                    <!-- Si publie = 0 on le notifie -->
                    <?php if ($_smarty_tpl->tpl_vars['value']->value['publie'] == 0) {?>

                      <p class="card-text"><i><u>Article non publié - Vous seul pouvez le voir</u></i></p>

                    <?php }?>

                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                    <p class="card-text"><b><?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</b></p>

                    <!-- Si pas de connexion en cours ne pas afficher le bouton pour modifier -->
                    <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == false) {?>

                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="voir.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-success">Voir l'article</a>
                      </div>

                    <!-- Sinon afficher le bouton pour modifier / supprimer -->
                    <?php } else { ?>

                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="voir.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-success">Voir l'article</a>
                        <a href="article.php?modif=1&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-primary">Modifier l'article</a>
                        <a href="supprimer.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-warning">Supprimer l'article</a>
                      </div>

                    <?php }?>

                  </div>
                </div>
              </div>
            </div>

		    	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		    </div>
		  </div>
		</div><?php }
}
