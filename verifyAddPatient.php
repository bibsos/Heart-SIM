<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    //$id1 = $_SESSION['ID'];
    //print '<pre>';
    //var_dump($id1);
    //print '</pre>';
    //echo $id1;

    if(isset($_POST['submit'])) {
        $id3 = $_POST['id'];
        echo $id3;
        //$query_centro = "SELECT users.Centro_saude FROM users WHERE users.ID = '$id3'";
        //$result_centro = mysqli_query($connect, $query_centro);
        //$centro_saude = mysqli_fetch_array($result_centro)[0];
        $centro_saude=$_POST['centro'];
        $nome = $_POST['nome'];
        $data = $_POST['data_nascimento'];
        $sexo = $_POST['Sexo'];
        $morada = $_POST['morada'];
        $contacto = $_POST['contacto'];
        $localidade = $_POST['localidade'];
        $distrito = $_POST['distrito'];
        $email = $_POST['email'];
        $cartao_saude = $_POST['cartao_saude'];
        $alergias = $_POST['alergias'];
        $nif = $_POST['nif'];
        $centro = $centro_saude;

        if(!empty($_FILES["image"]["name"])){
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if(in_array($fileType, $allowTypes)){
                $image = addslashes($_FILES['image']['tmp_name']);
                $fotografia = addslashes(file_get_contents($image));
            }
        }
        else {$fotografia=NULL;}


    $query = "INSERT INTO `patient`(`ID`, `Nome`, `Morada`, `Localidade`, `Distrito`, `Contacto`, `Email`, `Cartao_saude`, `Fotografia`, `Lista Alergias`, `Data Nascimento`, `Sexo`, `NIF`, `Centro_saude`)
        VALUES (NULL,'$nome','$morada','$localidade','$distrito','$contacto','$email','$cartao_saude','$fotografia','$alergias','$data','$sexo','$nif', '$centro')";
    $confirmation = "SELECT * FROM patient where $contacto = `Contacto` && $cartao_saude = `Cartao_saude`";
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
<form action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar"> </form>

