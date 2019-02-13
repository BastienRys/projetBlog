<?php
/* Smarty version 3.1.33, created on 2019-01-25 13:19:59
  from '/var/www/html/theBlog/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4afeefa26b98_07626524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9b75a7123a7c610ee9b02766adf4a4c0d5f855e' => 
    array (
      0 => '/var/www/html/theBlog/templates/index.tpl',
      1 => 1548418786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c4afeefa26b98_07626524 (Smarty_Internal_Template $_smarty_tpl) {
?>    <!-- Contenu de la page -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">Voici mon super site avec des articles COOL</h1>

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

          <!-- Si pas de connexion en cours ne pas afficher le message amical -->
          <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == FALSE) {?>

            <p class="lead">Bonjour, comment ça va ?</p>

          <!-- Sinon afficher le message amical -->
          <?php } else { ?>

            <p class="lead">Bonjour <?php echo $_smarty_tpl->tpl_vars['prenom_connect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['nom_connect']->value;?>
, ça va ? :)</p>
          
          <?php }?>

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

      <!-- Affichage du truc de pagination -->
      <div class="row">
        <nav class="mx-auto margin-top">
          <ul class="pagination pagination-lg border border-dark">

            <!-- Boucle allant de 1 à nombre de pages à afficher -->
            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>

              <!-- Test pour mettre en surbrillance la page actuelle -->
              <?php if (isset($_smarty_tpl->tpl_vars['page']->value) && ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['i']->value)) {?>

                <li class="page-item active"><a class="page-link" href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>

              <?php } else { ?>

                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>

              <?php }?>

            <?php }
}
?>

          </ul>
        </nav>
      </div>

    </div> 
    <!-- Fin contenu de la page --><?php }
}
