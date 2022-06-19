<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1> Novo paciente </h1>
</div>

<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));

    if(isset($_POST['submit'])) {
        $id_user = $_SESSION['ID'];
        $centro_saude = $_SESSION['instituicao'];
        $nome = $_POST['nome'];
        $data = $_POST['data_nascimento'];
        $sexo = $_POST['sexo'];
        $morada = $_POST['morada'];
        $contacto = $_POST['contacto'];
        $localidade = $_POST['localidade'];
        $distrito = $_POST['distrito'];
        $email = $_POST['email'];
        $cartao_saude = $_POST['cartao_saude'];
        $alergias = $_POST['alergias'];
        $nif = $_POST['nif'];
        $centro = $centro_saude;

        if(!empty($_FILES["foto"]["name"])){
            $fileName = basename($_FILES["foto"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if(in_array($fileType, $allowTypes)){
                $image = addslashes($_FILES['foto']['tmp_name']);
                $fotografia = addslashes(file_get_contents($image));
            }
        }
        else {$fotografia=NULL;}

    $query = "INSERT INTO `patient`(`ID`, `Nome`, `Morada`, `Localidade`, `Distrito`, `Contacto`, `Email`, `Cartao_saude`, `Fotografia`, `Lista_Alergias`, `Data_Nascimento`, `Sexo`, `NIF`, `Centro_saude`)
        VALUES (NULL,'$nome','$morada','$localidade','$distrito','$contacto','$email','$cartao_saude','$fotografia','$alergias','$data','$sexo','$nif', '$centro')";
    $confirmation = "SELECT * FROM patient where $cartao_saude = `Cartao_saude`";
    $confirm_query = mysqli_query($connect, $confirmation);
    if (mysqli_num_rows($confirm_query) == 0) {
        if (mysqli_query($connect, $query)) {
           echo("Paciente adicionado com sucesso!");
        }
        else {
            echo "Erro a adicionar o paciente:" . mysqli_error($connect);
        }
    }
    else {
        echo "Este paciente já existe!";
    }
    }
?>
<br>
<form type="POST" action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar"> </form>

