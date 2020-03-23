
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="../assets/js/stock.js"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
        
        
        <form method="POST" action="#">
  

  <?php
require './pdo_connexion.php';

$reponse = $bdd->query('SELECT * FROM magasin');
$donnees = $reponse->fetch();

?>




<h1>Votre magasin</h1> 


<br><br>
 <div>
    <form id='form' action='' method='post'>
     

  <div class="form-row">
  
    <div class="col-sm-6">
      <div class="form-group row">
        <label for="i1" class="col-sm-6 col-form-label">Enseigne : </label>
        <div class="col">
        <input type='text' name='nom' id='nom' value='<?php echo $donnees['name']; ?>' class="alert alert-success"
                        placeholder='Magasin' />
        </div>
      </div>
    </div>
    </div>
    

    <div class="form-row">
     <div class="col-sm-6">
      <div class="form-group row">
        <label for="i1" class="col-sm-6 col-form-label"> Magasin : </label>
        <div class="col">
        <input type='text' name='popup' id='popup' value='<?php echo $donnees['popupContent']; ?>' class="alert alert-success"
                        placeholder='' /><label>
        </div>
      </div>
    </div>
    </div>
  
    <div class="form-row">
     <div class="col-sm-6">
      <div class="form-group row">
        <label for="i1" class="col-sm-6 col-form-label">Horaires d'ouverture : </label>
        <div class="col">
        <textarea name="textarea" rows="8" id="texty" cols="40" value=""> <?php echo $donnees['horraire']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
  
   
  <div class="form-row">
     <div class="col-sm-6">
      <div class="form-group row">
        <label for="i1" class="col-sm-6 col-form-label">Commentaires : </label>
        <div class="col">
        <textarea name="textarea" rows="2" cols="40"><?php echo $donnees['commentaires']; ?></textarea>
        </div>
      </div>
    </div>
  </div>
    
  <div class="form-row">
     <div class="col-sm-4">
      <div class="form-group row">
        <label for="i1" class="col-sm-4 col-form-label">Adresse : </label>
        <div class="col">
        <textarea name="textarea" rows="2" cols="40"><?php echo $donnees['adresse']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
</form>


     <a name="" id="" class="btn btn-success" href="./dashboard.php" role="button">Retour menu</a>

    </form>


