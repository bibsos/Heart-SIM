<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Editar paciente </h1>
</div>
<?php

$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $centro = $_SESSION['instituicao'];
    $query = "SELECT * FROM `patient` AS p WHERE p.ID = '$id'";
    $result = mysqli_query($connect, $query) or die('The query failed' . mysqli_error($connect));
    $row = mysqli_fetch_array($result);

    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    }
    if (isset($_POST['morada'])) {
        $morada = $_POST['morada'];
    }
    if (isset($_POST['contacto'])) {
        $contacto = strval($_POST['contacto']);
    }
    if (isset($_POST['localidade'])) {
        $localidade = $_POST['localidade'];
    }
    if (isset($_POST['distrito'])) {
        $distrito = $_POST['distrito'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['data'])) {
        $data = $_POST['data'];
    }
    if (isset($_POST['cartao_saude'])) {
        $cartao_saude = $_POST['cartao_saude'];
    }
    if (isset($_POST['foto'])) {
        $fotografia = $_POST['foto'];
    }
    if (isset($_POST['alergias'])) {
        $alergias = $_POST['alergias'];
    }
    if (isset($_POST['nif'])) {
        $nif = $_POST['nif'];
    }
    if (empty($nome)) {
        $nome = $row['Nome'];
    }
    if (empty($date)) {
        $data = $row['Data_Nascimento'];
    }
    if (empty($morada)) {
        $morada = $row['Morada'];
    }
    if (empty($localidade)) {
        $localidade = $row['Localidade'];
    }
    if (empty($distrito)) {
        $distrito = $row['Distrito'];
    }
    if (empty($contacto)) {
        $contacto = $row['Contacto'];
    }
    if (empty($email)) {
        $email = $row['Email'];
    }
    if (empty($cartao_saude)) {
        $cartao_saude = $row['Cartao_saude'];
    }
    if (empty($fotografia)) {
        $fotografia = $row['Fotografia'];
    }
    if (empty($alergias)) {
        $alergias = $row['Lista_Alergias'];
    }
    if (empty($nif)) {
        $nif = $row['NIF'];
    }

    $update = "UPDATE `patient` SET `Nome`='$nome',`Morada`='$morada',`Localidade`='$localidade',`Distrito`='$distrito',`Contacto`='$contacto',`Email`='$email',`Cartao_saude`='$cartao_saude',`Fotografia`='$fotografia',`Lista_Alergias`='$alergias',`Data_Nascimento`='$data',`NIF`='$nif',`Centro_saude`='$centro' WHERE ID = '$id'";
    if (mysqli_query($connect, $update)) {
        echo("Alterações adicionadas com sucesso!");
    } else {
        echo "Erro a adicionar alterações:" . mysqli_error($connect);
    }

}
?>
<div>
    <form type="POST" action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar" style=" font-size: large" class="w3-teal w3-button"> </form>
</div>