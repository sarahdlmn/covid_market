
<div class="container col-12" id="mapside">
<h1 class="title" >Votre magasin</h1> 

<br><br>
 <div>

 <a name="" id="" class="btn btn-primary left ml-4" href="../index.php" role="button">Retour Carte</a>

    <form id='form' action='' method='post'>
     
  
    <div class="row">
    <div class="form-row">
     <div class="col-xs-12 col-sm-12 ">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12 col-12 col-form-label ">Horaires d'ouverture : </label>
        <div class="col-12">
        <textarea name="textarea" rows="8" class="texty" cols="30" value=""> <!-- <?php echo $donnees['horaire']; ?> --></textarea>
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
        <textarea name="textarea" rows="3" class="texty" cols="30"><!-- ?php echo $donnees['commentaires']; ?> --></textarea>
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
        <textarea name="textarea" rows="2" class="texty" cols="30"><!-- <?php echo $donnees['adresse']; ?> --></textarea>
        </div>
      </div>
    </div>
    </div>
    </div>

</form>
 </div>
 </div>

