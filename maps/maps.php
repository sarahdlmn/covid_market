<section class="row">
    <?php
    $marqueur=false;
    if(!empty($_POST['vrai'])){
           $marqueur = true;
    }
    if(!empty($_POST['faux'])){
        $marqueur = false;
    }

    if ($marqueur){
        echo '<div class="col-6">';
        include 'maps-side.php';
        echo '</div>';
        echo '<div id="mapid" class="col-6">';}
    else{
        echo '<div id="mapid" class="col-12">';
    }
 ?>
Affichage de la map leaft 
<br>
<form action="#" method="post">
<input type="submit" name="vrai" value="Avec Marqueur"><br>
<input type="submit" name="faux" value="Sans Marqueur">
</form>
</div>
</section>
