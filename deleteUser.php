<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$id = $_SESSION['ID'];
?>

<div class="w3-row-padding w3-padding-64 w3-container">
    <h1>  Apagar Utilizador </h1>
    <form method = "POST"">
    <label for = "tipo"> Selecione o Tipo de Utilizador: </label>
    <select name="tipo" id="tipo">
        <option value="" disabled selected> Escolha o tipo de utilizador </option>
        <option value="Adm"> Administrador </option>
        <option value="MF"> Médico de Família </option>
        <option value="MHC"> Médico Hospital Central </option>
        <option value="MHD"> Médico Hospital de Dia </option>
    </select>
    <input type="submit" name="submit" value="Selecionar">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $tipo = $_POST['tipo'];
        $query = "SELECT u.Nome, u.Instituicao, u.ID FROM users AS u WHERE u.ID != '$id' AND u.Tipo = '$tipo'";
        $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
        ?>
        <form method = "POST" action="index.php?action=verify_ApagarUtilizador">
            <label for = "user"> Selecione o Utilizador: </label>
            <select name="user" id="user">
                <option value="" disabled selected> Escolha o utilizador </option>
                <?php while($rows = mysqli_fetch_array($result)){
                    $nome_user = $rows[0];
                    $instituicao = $rows[1];
                    $id_user = $rows[2];
                    ?>
                    <option value="<?php echo $id_user ?>"> <?php echo $nome_user.",".$instituicao;  ?> </option>
                <?php } ?>
            </select>
            <input type="submit" name="submit1" value="Apagar">
        </form>
    <?php } ?>
    <form action="index.php?action=listUsers"> <input type="submit" name="submit" value="Voltar"> </form>
</div>
