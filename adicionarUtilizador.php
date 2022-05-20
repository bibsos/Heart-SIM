<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $begin = mysqli_begin_transaction($connect);
?>
    <form method="POST">
        <p>Tipo de utilizador: <input type="options" name="tipo"> </p>
        <p>Nome: <input type="text" name="nome"> </p>
        <p>Morada: <input type="text" name="morada"> </p>
        <p>Contacto: <input type="number" name="contacto"> </p>
        <p>Username: <input type="username" name="username"> </p>
        <p>Password: <input type="password" name="password"> </p>
        <p>Fotografia: <input type="file" name="foto"> </p>
        <p> <input type="submit" name="submit" value="Adicionar Utilizador"></p>
    </form>

<?php
    $query = "UPDATE `utilizador` set `Tipo` = tipo, `Nome` = nome, `Morada` = morada, `Contactos` = contacto,
    `username` = username, `password` = password, `Fotografia` = foto";
    $result = mysqli_query($connect, $query);
 //   if (mysqli_commit(mysqli_fetch_array($result))){
 //       echo tipo. " com o seguinte nome ".nome." adicionado com sucesso.";
 //   }
 //   else{
 //       echo "Não foi possível adicionar o utilizador";
 //   }