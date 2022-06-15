<?php

    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    include("pacientes.php");
    if(isset($_POST['submit'])) {
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
        $centro = "Charneca de Caparica";

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

