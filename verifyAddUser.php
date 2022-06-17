<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    if(isset($_POST['submit'])) {
        $tipo = $_POST['tipo'];
        $nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $contacto = $_POST['contacto'];
        $username = $_POST['username'];
        $password = hash("sha256", $_POST['password']);
        $fotografia = $_POST['foto'];
        $centro_saude = $_POST['centro_saude'];

        $query = "INSERT INTO `users`(`ID`, `Tipo`, `Nome`, `Morada`, `Contacto`, `username`, `password`, `Fotografia`, `Centro_saude`) 
        VALUES (NULL,'$tipo','$nome','$morada','$contacto','$username','$password','$fotografia', '$centro_saude')";
        $confirmation = "SELECT `Contacto` FROM users where $contacto = `Contacto`";
        $confirm_query = mysqli_query($connect, $confirmation);
        if (mysqli_num_rows($confirm_query) == 0) {
            if (mysqli_query($connect, $query)) {

                echo("Utilizador adicionado com sucesso!");
            } else {
                echo "Erro a adicionar o utilizador:" . mysqli_error($connect);
            }
        }
            else {
                echo "Utilizador já existe!";
            }
        }
?>

