
<div class="w3-row-padding w3-padding-64 w3-container">
    <h3>  Editar Perfil </h3>
</div>
<div class="w3-padding w3-margin">
    <?php
        if(isset($_POST['submit'])){
            $id_profile = $_POST['id_profile'];
        ?>
            <form method="POST" action="index.php?action=verifyUpdateProfile">
                <p style=" font-size: large"> <b> Nome: </b> <input class="w3-input" type="text" name="nome"> </p>
                <p style=" font-size: large"> <b> Morada: </b> <input class="w3-input" type="text" name="morada"> </p>
                <p style=" font-size: large"> <b> Contacto: </b> <input class="w3-input" type="number" name="contacto"> </p>
                <p style=" font-size: large"> <b> Username: </b> <input class="w3-input" type="username" name="username"> </p>
                <p style=" font-size: large"> <b> Password: </b> <input class="w3-input" type="password" name="password"> </p>
                <p style=" font-size: large"> <b> Fotografia: </b> <input class="w3-input" type="file" name="foto"> </p>
                <p style=" font-size: large"> <b> Instituição: </b> <input class="w3-input" type="text" name="instituicao"> </p>
                <p style=" font-size: large"> <input type="submit" name="submit" value="Confirmar" class="w3-teal w3-button"></p>
                <p> <input type="hidden" value ="<?php echo $id_profile ?>" name="id_profile"> </p>
            </form>
      <?php  } ?>



</div>