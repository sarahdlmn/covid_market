<?php 
require './header-dashboard.php';

require './pdo_connexion.php';

$reponse = $bdd->query('SELECT * FROM magasin');
$donnees = $reponse->fetch();

?>

<h1 class="title" >Votre magasin</h1> 

<br><br>
 <div>
    <form id='form' action='' method='post'>
     

  <div class="form-row">
  
    <div class="col-sm-6 col-12">
      <div class="form-group row">
        <label for="i1" class="col-sm-6 col-6 col-form-label">Enseigne : </label>
        <div class="col">
        <input type='text' name='nom' id='nom' value='<?php echo $donnees['name']; ?>' class="alert alert-success"
                        placeholder='Magasin' />
        </div>
      </div>
    </div>
    </div>
    

    <div class="form-row">
     <div class="col-sm-6  col-12">
      <div class="form-group row">
        <label for="i1" class="col-sm-6  col-6 col-form-label"> Nom sur la carte : </label>
        <div class="col">
        <input type='text' name='popup' id='popup' value='<?php echo $donnees['popupContent']; ?>' class="alert alert-success"
                        placeholder='' /><label>
        </div>
      </div>
    </div>
    </div>
  
    <div class="form-row">
     <div class="col-sm-6  col-12">
      <div class="form-group row">
        <label for="i1" class="col-sm-6 col-6 col-form-label ">Horaires d'ouverture : </label>
        <div class="col-6">
        <textarea name="textarea" rows="8" class="texty" cols="40" value=""> <?php echo $donnees['horraire']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
  
   
  <div class="form-row">
     <div class="col-sm-6  col-12">
      <div class="form-group row">
        <label for="i1" class="col-sm-6  col-6 col-form-label ">Commentaires : </label>
        <div class="col-6">
        <textarea name="textarea" rows="3" class="texty" cols="40"><?php echo $donnees['commentaires']; ?></textarea>
        </div>
      </div>
    </div>
  </div>
    
  <div class="form-row">
     <div class="col-sm-6">
      <div class="form-group row">
        <label for="i1" class="col-sm-6 col-6 col-form-label ">Adresse : </label>
        <div class="col-6">
        <textarea name="textarea" rows="2" class="texty" cols="40"><?php echo $donnees['adresse']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
</form>


     <a name="" id="form-row" class="btn btn-success" href="./dashboard.php" role="button">Retour menu</a>

    </form>




