<?php 
require './header-dashboard.php';

require './pdo_connexion.php';

$reponse = $bdd->query('SELECT * FROM magasin Where id_magasin='.$_SESSION['identifiant'].'');
$donnees = $reponse->fetch();

?>
 <div class="container">
<h1 class="title" >Votre magasin</h1> 

<br><br>
 <div>
    <form id='form' action='' method='post'>
     
   
  <div class="form-row row">
    <div class="col-sm-12  col-xs-12 col-12">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12 col-12 col-form-label">Enseigne : </label>
        <div class="row">
        <div class="col-12">
        <input type='text' name='nom' id='nom' value='<?php echo $donnees['name']; ?>' class="alert alert-success text-center" 
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
        <input type='text' name='popup' id='popup' value='<?php echo $donnees['popup_content']; ?>' class="alert alert-success text-center"
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
        <textarea name="textarea" rows="8" class="texty" cols="30" value=""> <?php echo $donnees['horaire']; ?></textarea>
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
        <textarea name="textarea" rows="3" class="texty" cols="30"><?php echo $donnees['commentaires']; ?></textarea>
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
        <textarea name="textarea" rows="2" class="texty" cols="30"><?php echo $donnees['adresse']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
    </div>

<?php 
require 'map.php';
?>
</form>


     <a name="" id="form-row" class="btn btn-success" href="./dashboard.php" role="button">Retour menu</a>

    </form>

  </div>




