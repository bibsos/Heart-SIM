<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
?>

<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1> Novo paciente </h1>
</div>
<div class="w3-padding w3-container">
<form method="POST" enctype="multipart/form-data" action="index.php?action=verifyAddPatient">
    <p style=" font-size: large"> <b> Nome: </b> <input class="w3-input" type="text" name="nome"> </p>
    <p style=" font-size: large"> <b> Data de Nascimento: </b> </p> <p> <input type="date" name="data_nascimento"</p>
    <p style=" font-size: large"> <b> Sexo: </b> </p>
    <p>
        <input class="w3-radio" type="radio" id="F" name="sexo" value="F">
        <label for="F">Feminino </label>
        <input class="w3-radio" type="radio" id="M" name="sexo" value="M">
        <label for="M"> Masculino </label>
    </p>

    <p style=" font-size: large"> <b> Morada: </b> <input class="w3-input" type="text" name="morada"> </p>
    <p style=" font-size: large"> <b> Localidade: </b> <input class="w3-input" type="text" name="localidade"></p>
    <p style=" font-size: large"> <b> Distrito: </b> <input class="w3-input" type="text" name="distrito"</p>
    <p style=" font-size: large"> <b> Contacto:  </b><input class="w3-input" type="number" name="contacto"> </p>
    <p style=" font-size: large"> <b> Email: </b> <input class="w3-input" type="email" name="email"</p>
    <p style=" font-size: large"> <b> Cartão de Saúde: </b> <input class="w3-input" type="number" name="cartao_saude"</p>

    <p><label for = "foto"> <b style=" font-size: large"> Fotografia do paciente: </b></label></p>
    <input type="file"  accept="image/*" id="foto" name="foto"> </p>
    <p style=" font-size: large"> <b> Alergias: </b> <input class="w3-input" type="text" name="alergias"> </p>
    <p style=" font-size: large"> <b> NIF: </b> <input class="w3-input" type="number" name="nif"> </p>
    <p style=" font-size: large"> <input type="submit" name="submit" value="Adicionar Paciente" class="w3-teal w3-button"></p>
</form>
</div>
