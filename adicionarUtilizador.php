<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $begin = mysqli_begin_transaction($connect);
?>
    <form method="POST" action="index.php?verifyAddUser">
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
