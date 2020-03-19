<section class="row">
    <?php
    $marqueur = null;
    if(!empty($_POST['test'])){
       if( $marqueur == 1 ){
           $marqueur = null;
        }else{
        $marqueur=1;
        }
    }

    if ( $marqueur != null){
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
<input type="submit" name="test" value="Marqueur">
</form>
</div>
</section>
