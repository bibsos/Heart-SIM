<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Apagar paciente </h1>
</div>
<?php

$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$ID = $_SESSION['ID'];
$query = "SELECT * FROM `patient` AS p WHERE p.ID = '$ID'";
$result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])) {
    $ID=$row['ID'];
    $nome = $_POST['nome'];
    $data = $_POST['data_nascimento'];
    $sexo = $_POST['Sexo'];
    $morada = $_POST['morada'];
    $contacto = $_POST['contacto'];
    $localidade = $_POST['localidade'];
    $distrito = $_POST['distrito'];
    $fotografia = $_POST['foto'];
    $email = $_POST['email'];
    $cartao_saude = $_POST['cartao_saude'];
    $alergias = $_POST['alergias'];
    $nif = $_POST['nif'];


    if(empty($nome)){
        $nome=$row['Nome'];
    }
    if(empty($data)){
        $data=$row['Data_Nascimento'];
    }
    if(empty($sexo)){
        $sexo=$row['Sexo'];
    }
    if(empty($morada)){
        $morada=$row['Morada'];
    }
    if(empty($localidade)){
        $localidade=$row['Localidade'];
    }
    if(empty($distrito)){
        $distrito=$row['Distrito'];
    }
    if(empty($fotografia)){
        $fotografia=$row['Fotografia'];
    }
    if(empty($email)){
        $email=$row['Email'];
    }
    if(empty($cartao_saude)){
        $cartao_saude=$row['Cartao_saude'];
    }
    if(empty($alergias)){
        $alergias=$row['Lista_Alergias'];
    }
    if(empty($nif)){
        $nif=$row['NIF'];
    }
    if(empty($centro)){
        $centro=$row['Centro_saude'];
    }

    $update = "UPDATE `patient` SET `ID`=$ID,`Nome`=$nome,`Morada`=$morada,`Localidade`=$localidade,`Distrito`=$distrito,`Contacto`=$contacto,`Email`=$email,`Cartao_saude`=$cartao_saude,`Fotografia`=$fotografia,`Lista Alergias`=$alergias,`Data Nascimento`=$data,`Sexo`=$sexo,`NIF`=$nif,`Centro_saude`=$centro WHERE 1";
    $confirmation = "SELECT * FROM users where $contacto = `Contacto` && $cartao_saude = `Cartao_saude`";
    $confirm_query = mysqli_query($connect, $confirmation);
    if (mysqli_num_rows($confirm_query) == 0) {
        if (mysqli_query($connect, $query)) {
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

<form type="POST" action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar"> </form>
