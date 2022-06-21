<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Editar perfil </h1>
</div>

<?php

$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$id_profile = strval($_POST['id_profile']);
$query = "SELECT * FROM `users` AS u WHERE u.ID = '$id_profile'";
$result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])) {
    if(isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    }
    if(isset($_POST['morada'])){
        $morada = $_POST['morada'];
    }
    if(isset($_POST['contacto'])){
        $contacto = strval($_POST['contacto']);
    }
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }
    if(isset($_POST['password'])){
        $password = hash("sha256", $_POST['password']);
    }
    if(isset($_POST['foto'])){
        $fotografia = $_POST['foto'];
    }
    if(isset($_POST['instituicao'])){
        $instituicao = $_POST['instituicao'];
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
    $update = "UPDATE `users` SET Nome='$nome',Morada='$morada',Contacto='$contacto',username='$username',password='$password',Fotografia='$fotografia',Instituicao='$instituicao' WHERE ID='$id_profile' ";
    if (mysqli_query($connect, $update)){
        echo("Alterações adicionadas com sucesso!");
    }
    else {
        echo "Erro a adicionar alterações:" . mysqli_error($connect);
    }
}
?>
<form type="POST" action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar" style=" font-size: large" class="w3-teal w3-button"> </form>
