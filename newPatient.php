<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$id2 = $_SESSION['ID'];
echo $id2;
$query_centro = "SELECT users.Instituicao FROM users WHERE users.ID = '$id2'";
$result_centro = mysqli_query($connect, $query_centro);
$centro_saude = mysqli_fetch_array($result_centro)[0];
echo $centro_saude;
?>

<div class="w3-row-padding w3-padding-64 w3-container">
    <h1> Novo paciente </h1>
<form method="POST" action="verifyAddPatient.php">
    <p>Nome: <input type="text" name="nome"> </p>
    <p>Data de Nascimento: <input type="date" name="data_nascimento"</p>
    <p>Sexo:
        <input type="radio" id="F" name="Sexo" value="F">
        <label for="F">Feminino </label>
        <input type="radio" id="M" name="Sexo" value="M">
        <label for="M"> Masculino </label>
    </p>

    <p>Morada: <input type="text" name="morada"> </p>
    <p>Localidade: <input type="text" name="localidade"></p>
    <p>Distrito: <input type="text" name="distrito"</p>
    <p>Contacto: <input type="number" name="contacto"> </p>
    <p>Email: <input type="email" name="email"</p>
    <p>Cartão de Saúde: <input type="number" name="cartao_saude"</p>

    <br>
    <p><label for = "foto"> <span <b> Fotografia do paciente: </b></span></label></p>
    <input type="file" accept="image/*" id="foto" name="image" > </p>
    <br>

    <p>Alergias: <input type="text" name="alergias"> </p>
    <p>NIF: <input type="number" name="nif"> </p>
    <input type="hidden" name="id" value="<?php $id2 ?>">
    <input type="hidden" name="centro" value="<?php $centro_saude ?>"
    <p> <input type="submit" name="submit" value="Adicionar Paciente"></p>
</form>
    </div>
