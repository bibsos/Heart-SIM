<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Editar perfil </h1>
</div>

<?php

    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $ID = $_SESSION['ID'];
    $utilizador = $_SESSION['utilizador'];
    $query = "SELECT * FROM `users` AS u WHERE u.ID = $ID";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
    $row = mysqli_fetch_array($result);

if(isset($_POST['submit'])) {
    $ID=$row['ID'];
    if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
    }
    else{
        $tipo = "";
    }
    $nome = $_POST['nome'];
    $morada = $_POST['morada'];
    $contacto = strval($_POST['contacto']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fotografia = $_POST['foto'];
    $instituicao = $_POST['instituicao'];

    if(empty($tipo)){
        $tipo=$row['Tipo'];
    }
    if(empty($nome)){
        $nome=$row['Nome'];
    }
    if(empty($morada)){
        $morada=$row['Morada'];
    }
    if(empty($contacto)){
        $contacto=$row['Contacto'];
    }
    if(empty($username)){
        $username=$row['username'];
    }
    if(empty($password)){
        $password=$row['password'];
    }
    if(empty($fotografia)){
        $fotografia=$row['Fotografia'];
    }
    if(empty($instituicao)){
        $instituicao=$row['Instituicao'];
    }
    echo $ID;
    $update = "UPDATE `users` AS u SET u.Tipo=$tipo,u.Nome=$nome,u.Morada=$morada,u.Contacto=$contacto,u.username=$username,u.password=$password,u.Fotografia=$fotografia,u.Instituicao=$instituicao WHERE u.ID='$ID' ";
    $confirmation = "SELECT `Contacto` FROM users where $contacto = `Contacto`";
    $confirm_query = mysqli_query($connect, $confirmation);
    if (mysqli_num_rows($confirm_query) == 0){
        if (mysqli_query($connect, $query)){
            echo("Alterações adicionadas com sucesso!");
        }
        else {
            echo "Erro a adicionar alterações:" . mysqli_error($connect);
        }
    }
    else {
        echo "Este paciente já existe!";
    }
}
?>
<form type="POST" action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar" style=" font-size: large" class="w3-teal w3-button"> </form>
