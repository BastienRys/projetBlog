<?php
/* Smarty version 3.1.33, created on 2019-02-13 11:58:11
  from '/var/www/html/theBlog (copie)/templates/voir.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c63f8437f5862_06603732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25ad711055b07cabb89d00c1927e66e1107901b9' => 
    array (
      0 => '/var/www/html/theBlog (copie)/templates/voir.tpl',
      1 => 1550055486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c63f8437f5862_06603732 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Contenu de la page -->
<div class="container">

  <!-- Si il y a des variables de sessions relatives aux notifications -->
  <?php if (isset($_smarty_tpl->tpl_vars['session_var']->value['notifications'])) {?>

    <!-- On affiche un message d'alerte -->
    <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['alert'];?>
 alert-dismissible fade show text-center" role="alert">
            
      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>

      <!-- Afichage du message de notification -->
      <?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['message'];?>


    </div>

  <?php }?>

  <!-- TITRE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"><?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['titre'];?>
</h1>
    </div>
  </div>

  <!-- IMAGE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-7 center margin-top">
      <img class="card-img-top" src="img/<?php echo $_smarty_tpl->tpl_vars['id_article']->value;?>
.png" alt="Card image cap">
    </div>
  </div>

  <!-- DATE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-7 center">
      <p><b>Article publié le <?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['date_fr'];?>
</b></p>
    </div>
  </div>

  <!-- TEXTE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-7 center margin-top margin-bot">
      <p><?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['texte_article'];?>
</p>
    </div>
  </div>

  <!-- FORMULAIRE D'AJOUT DE COMMENTAIRE -->
  <div class="row">
    <div class="col-lg-6 center">

      <!-- On affiche les commentaires de l'article avant le formulaire -->
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>

        <hr/>
        <p><b><?php echo $_smarty_tpl->tpl_vars['value']->value['pseudo'];?>
</b></p>
        <p><?php echo $_smarty_tpl->tpl_vars['value']->value['texte_comm'];?>
</p>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

      <hr/>
      <form id="form_comm" action="voir.php?id=<?php echo $_smarty_tpl->tpl_vars['id_article']->value;?>
" onsubmit="return validateForm()" method="POST">
            
        <!-- PSEUDONYME ET MAIL -->
        <div class="form-group form-row">
          <div class="col">
            <input id="pseudo" class="form-control" type="text" name="pseudo" placeholder="Pseudonyme">
          </div>
          <div class="col">
            <input id="mail" class="form-control" type="text" name="mail" placeholder="E-mail">
          </div>
        </div>

        <!-- COMMENTAIRE -->
        <div class="form-group row">
          <div class="col">
            <textarea rows="2" id="texte" class="form-control" name="texte" rows="3" placeholder="Votre commentaire..."></textarea>
          </div>
        </div>

        <!-- BOUTON -->
        <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit" value="1">Ajouter le commentaire</button>

      </form>
    </div>
  </div>

</div>

<?php echo '<script'; ?>
 type="text/javascript">

  function validateForm() {

    var pseudo = document.forms["form_comm"]["pseudo"].value;
    var mail = document.forms["form_comm"]["mail"].value;
    var texte = document.forms["form_comm"]["texte"].value;

    if (pseudo == "") {

      alert("Vous devez indiquer un pseudonyme");
      return false;
    }

    if (mail = "") {

      alert("Vous devez indiquer une adresse mail");
      return false;
    }

    if (texte = "") {

      alert("Votre commentaire ne peut pas être vide");
      return false;
    }
  } 

<?php echo '</script'; ?>
>

<?php }
}
