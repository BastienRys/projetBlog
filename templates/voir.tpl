<!-- Contenu de la page -->
<div class="container">

  <!-- Si il y a des variables de sessions relatives aux notifications -->
  {if isset($session_var.notifications)}

    <!-- On affiche un message d'alerte -->
    <div class="alert alert-{$session_var.notifications.alert} alert-dismissible fade show text-center" role="alert">
            
      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>

      <!-- Afichage du message de notification -->
      {$session_var.notifications.message}

    </div>

  {/if}

  <!-- TITRE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">{$tab_article[0].titre}</h1>
    </div>
  </div>

  <!-- IMAGE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-7 center margin-top">
      <img class="card-img-top" src="img/{$id_article}.png" alt="Card image cap">
    </div>
  </div>

  <!-- DATE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-7 center">
      <p><b>Article publié le {$tab_article[0].date_fr}</b></p>
    </div>
  </div>

  <!-- TEXTE DE L'ARTICLE -->
  <div class="row">
    <div class="col-lg-7 center margin-top margin-bot">
      <p>{$tab_article[0].texte_article}</p>
    </div>
  </div>

  <!-- FORMULAIRE D'AJOUT DE COMMENTAIRE -->
  <div class="row">
    <div class="col-lg-6 center">

      <!-- On affiche les commentaires de l'article avant le formulaire -->
      {foreach $tab_article as $value}

        <hr/>
        <p><b>{$value.pseudo}</b></p>
        <p>{$value.texte_comm}</p>

      {/foreach}

      <hr/>
      <form id="form_comm" action="voir.php?id={$id_article}" onsubmit="return validateForm()" method="POST">
            
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

<script type="text/javascript">

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

</script>

