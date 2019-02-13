<?php
/* Smarty version 3.1.33, created on 2019-01-11 14:51:20
  from '/var/www/html/theBlog/templates/utilisateurs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c389f58eaefe1_24461936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e0de23684ab53fd4c33d4f996b7ff80db430cd7' => 
    array (
      0 => '/var/www/html/theBlog/templates/utilisateurs.tpl',
      1 => 1547214066,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c389f58eaefe1_24461936 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">

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

      </div><?php }
}
