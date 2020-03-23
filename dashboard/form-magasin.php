
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
        
        
        <form method="POST" action="#">
  

  <?php
require './pdo_connexion.php';

$reponse = $bdd->query('SELECT * FROM magasin');
$donnees = $reponse->fetch();
var_dump($donnees);

?>

<div class="form-group">


<h1>Magasin</h1> 



 <div>
    <form id='form' action='' method='post'>
     


        <div class="d-flex justify-content-center">
            <label>Magasin : <input type='text' name='nom' id='nom' value='<?php echo $donnees['name']; ?>' class="alert alert-success"
                        placeholder='' /><label><br/>
        </div>

        <p>popupcontent : <input type="text" id='popup' value="<?php echo $donnees['popupContent']; ?>" /></p>


        <div class="d-flex justify-content-center">
    <label >Horaires :<input type='textarea' name='horaires' id='horaires' value='' class="alert alert-success" 
                       /><label><br/></label>
    
        </div>

        <div class="d-flex justify-content-center">
            <label>Commentaires : <input type='textearea' name='comments' id='comments' value='' class="alert alert-success" 
                    placeholder='' /></label>
            <br/>
        </div>

        <div class="d-flex justify-content-center">
            <label>Adresse : <input type='text' name='address' id='address' value='' class="alert alert-success" 
                    placeholder='' /></label>
            <br/>
        </div>


<br><br>
        <a input type="button" name="" class="btn btn-success" href="./dashboard.php" role="button">Retour menu</a>

    </form>
</div>

 </div>
</form>


