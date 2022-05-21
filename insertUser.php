<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    if(isset($_POST['submit'])){
        $tipo = $_POST['tipo'];
        $nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $contacto = $_POST['contacto'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fotografia = $_POST['foto'];

        $query = "INSERT INTO `utilizador`(`ID`, `Tipo`, `Nome`, `Morada`, `Contactos`, `username`, `password`, `Fotografia`) VALUES ('','$tipo','$nome','$morada','$contacto','$username','$password','$fotografia')";
        if(mysqli_query($connect, $query)){
            echo ("Utilizador adicionado com sucesso!");
        }
        else{
            echo "Erro a adicionar o utilizador:".mysqli_error($connect);
        }
    }
    include(adicionarUtilizador.php);
?>

