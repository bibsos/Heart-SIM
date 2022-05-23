<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $begin = mysqli_begin_transaction($connect);
?>
    <form method="POST" action="index.php?action=verifyAddUser">
        <p>Tipo de utilizador:
            <input type="radio" id="Adm" name="tipo" value="Administrador">
            <label for="Adm"> Administrador </label>
            <input type="radio" id="MF" name="tipo" value="Médico de Família">
            <label for="MF"> Médico de Familía </label>
            <input type="radio" id="MHD" name="tipo" value="Médico Hospital de Dia">
            <label for="MHD"> Médico Hospital de Dia </label>
            <input type="radio" id="MHC" name="tipo" value=" Médico Hospital Central">
            <label for="MGC"> Médico Hospital Central </label>
        </p>
        <p>Nome: <input type="text" name="nome"> </p>
        <p>Morada: <input type="text" name="morada"> </p>
        <p>Contacto: <input type="number" name="contacto"> </p>
        <p>Username: <input type="username" name="username"> </p>
        <p>Password: <input type="password" name="password"> </p>
        <p>Fotografia: <input type="file" name="foto"> </p>
        <p> <input type="submit" name="submit" value="Adicionar Utilizador"></p>
    </form>

<?php
