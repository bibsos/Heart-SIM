
    <form method="POST" action="verifyAddUser.php">
        <p>Tipo de utilizador:
            <input type="radio" id="Adm" name="tipo" value="Adm">
            <label for="Adm"> Administrador </label>
            <input type="radio" id="MF" name="tipo" value="MF">
            <label for="MF"> Médico de Família </label>
            <input type="radio" id="MHD" name="tipo" value="MHD">
            <label for="MHD"> Médico Hospital de Dia </label>
            <input type="radio" id="MHC" name="tipo" value=" MHC">
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