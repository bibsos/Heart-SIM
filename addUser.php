<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1> Adicionar Utilizadores </h1>
</div>

<div class="w3-padding w3-container">
    <form method="POST" action="verifyAddUser.php">
        <p style=" font-size: large"> <b> Tipo de utilizador: </b> </p>
        <p>
            <input class="w3-radio" type="radio" id="Adm" name="tipo" value="Adm">
            <label for="Adm"> Administrador </label>
            <input class="w3-radio" type="radio" id="MF" name="tipo" value="MF">
            <label for="MF"> Médico de Família </label>
            <input class="w3-radio" type="radio" id="MHD" name="tipo" value="MHD">
            <label for="MHD"> Médico Hospital de Dia </label>
            <input class="w3-radio" type="radio" id="MHC" name="tipo" value="MHC">
            <label for="MHC"> Médico Hospital Central </label>
        </p>
        <p style=" font-size: large"> <b> Nome: </b> <input class="w3-input" type="text" name="nome"> </p>
        <p style=" font-size: large"> <b> Morada: </b> <input class="w3-input" type="text" name="morada"> </p>
        <p style=" font-size: large"> <b> Contacto: </b> <input class="w3-input" type="number" name="contacto"> </p>
        <p style=" font-size: large"> <b> Username: </b> <input class="w3-input" type="username" name="username"> </p>
        <p style=" font-size: large"> <b> Password: </b> <input class="w3-input" type="password" name="password"> </p>
        <p style=" font-size: large"> <b> Fotografia: </b> <input type="file" name="foto"> </p>
        <p style=" font-size: large"> <b> Instituição: </b> <input class="w3-input" type="text" name="instituicao"> </p>
        <p style=" font-size: large"> <input type="submit" name="submit" value="Adicionar Utilizador" class="w3-teal w3-button"></p>
    </form>
</div>