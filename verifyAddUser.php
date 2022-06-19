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

        $instituicao = $_POST['instituicao'];

        if(!empty($_FILES["foto1"]["name"])){
            $fileName = basename($_FILES["foto1"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if(in_array($fileType, $allowTypes)){
                $image = addslashes($_FILES['foto1']['tmp_name']);
                $fotografia = addslashes(file_get_contents($image));
            }
        }
        else {$fotografia=NULL;}

        $query = "INSERT INTO `users`(`ID`, `Tipo`, `Nome`, `Morada`, `Contacto`, `username`, `password`, `Fotografia`, `Instituicao`) 
        VALUES (NULL,'$tipo','$nome','$morada','$contacto','$username','$password','$fotografia', '$instituicao')";
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

<form action="index.php?action=listUsers"> <input type="submit" name="submit" value="Voltar"> </form>