<?php
session_start();
require './header-dashboard.php';
require './pdo_connexion.php';

session_start();
$id = $_SESSION['identifiant'];
$reponse = $bdd->query('SELECT * FROM magasin WHERE id_magasin = \'' . $_SESSION['identifiant'] . '\'');
$magasin = $reponse->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
<h1 class="title" >Votre magasin</h1>
<div>

<br><br>
 <div>
  <div class="form-row row">
    <div class="col-sm-12  col-xs-12 col-12">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12 col-12 col-form-label">Enseigne : </label>
        <div class="row">
        <div class="col-12">

        <input type="text" id="nom" value="<?php echo $magasin['name']; ?>" class="alert alert-successtext-center" 
                        placeholder='Magasin' />

        </div>
      </div>
    </div>
    </div>
    </div>


    <div class="row">
    <div class="form-row">
     <div class="col-sm-12  col-12 col-xs-12">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12  col-12 col-form-label"> Nom pour vos clients : </label>
        <div class="col-12">

        <input type="text" id="popup" value="<?php echo $magasin['popup_content']; ?>" class="alert alert-successtext-center"
                        placeholder='' /><label>

        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="form-row">
     <div class="col-xs-12 col-sm-12 ">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12 col-12 col-form-label ">Horaires d'ouverture : </label>
        <div class="col-12">
        <textarea id="horaire" name="textarea" rows="8" class="texty" cols="30" value=""><?php echo $magasin['horaire']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="row">
  <div class="form-row">
     <div class="col-sm-12  col-12 col-xs-12">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12  col-12 col-form-label ">Commentaires : </label>
        <div class="col-12">
        <textarea id="commentaires" name="textarea" rows="3" class="texty" cols="30"><?php echo $magasin['commentaires']; ?></textarea>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="row">
  <div class="form-row">
     <div class="col-sm-12 col-xs-12">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12 col-12 col-form-label ">Adresse : </label>
        <div class="col-12">
        <textarea id="adresse" name="textarea" rows="2" class="texty" cols="30"><?php echo $magasin['adresse']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>
    <?php
    require 'map.php';
    ?>


     <a name="" id="form-row" class="btn btn-success" href="./dashboard.php" role="button">Retour menu</a>

    </form>

  </div>
