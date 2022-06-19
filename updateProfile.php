
<div class="w3-row-padding w3-padding-64 w3-container">
    <h3>  Editar Perfil </h3>

    <?php
        $utilizador = $_SESSION['utilizador'];
        if(isset($_POST['submit'])){
        ?>
            <form method="POST" action="index.php?action=verifyUpdateProfile">
                <p>Nome: <input type="text" name="nome"> </p>
                <p>Morada: <input type="text" name="morada"> </p>
                <p>Contacto: <input type="number" name="contacto"> </p>
                <p>Username: <input type="username" name="username"> </p>
                <p>Password: <input type="password" name="password"> </p>
                <p>Fotografia: <input type="file" name="foto"> </p>
                <p>Instituição: <input type="text" name="instituicao"> </p>
                <p> <input type="submit" name="submit" value="Confirmar"></p>
            </form>
      <?php  } ?>



</div>