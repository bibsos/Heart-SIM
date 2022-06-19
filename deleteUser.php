<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
?>

<div class="w3-row-padding w3-padding-64 w3-container">
    <h1>  Apagar Utilizador </h1>
</div>
<div class="w3-padding w3-container">
    <form class="w3-input" method = "POST"">
        <label for = "tipo" style=" font-size: large"> <b> Selecione o Tipo de Utilizador: </b></label>
        <select class="w3-select" name="tipo" id="tipo">
            <option value="" disabled selected> ... </option>
            <option value="Adm"> Administrador </option>
            <option value="MF"> Médico de Família </option>
            <option value="MHC"> Médico Hospital Central </option>
            <option value="MHD"> Médico Hospital de Dia </option>
        </select>
    <p> <input type="submit" name="submit" value="Selecionar" class="w3-teal w3-button"> </p>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $tipo = $_POST['tipo'];
            $query = "SELECT u.Nome, u.Instituicao, u.ID FROM users AS u WHERE u.ID != '$id' AND u.Tipo = '$tipo'";
            $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
        ?>
</div>
<div class="w3-padding w3-container">
        <form class="w3-input" method = "POST" action="index.php?action=verify_ApagarUtilizador">
            <label for = "user" style=" font-size: large"> <b> Selecione o Utilizador: </b> </label>
            <select class="w3-select" name="user" id="user">
                <option value="" disabled selected> ... </option>
                <?php while($rows = mysqli_fetch_array($result)){
                    $nome_user = $rows[0];
                    $instituicao = $rows[1];
                    $id_user = $rows[2];
                ?>
            <option value="<?php echo $id_user ?>"> <?php echo $nome_user.",".$instituicao;  ?> </option>
            <?php } ?>
            </select>
            <p> <input type="submit" name="submit1" value="Apagar" class="w3-teal w3-button"> </p>
        </form>
        <?php } ?>
</div>
<div class="w3-padding w3-container w3-bottom">
    <form action="index.php?action=listUsers"> <input type="submit" name="submit" value="Voltar" class="w3-teal w3-button"> </form>
</div>