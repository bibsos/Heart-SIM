<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$id = $_SESSION['ID'];
$centro_saude = $_SESSION['instituicao'];
$query = "SELECT p.Nome AS 'Paciente', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
        WHERE p.Centro_saude = '$centro_saude' AND  e.ID IS NULL";
$result = mysqli_query($connect, $query);
?>
<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Editar Ficha de paciente </h1>
</div>

<div class="w3-padding w3-container">
    <form method = "POST" action="index.php?action=verifyUpdatePatients">
        <p><label for = "id" style=" font-size: large"> <b> Selecione o paciente: </b> </label> </p>
        <select class="w3-select" name="id" id="id">
            <option value="" disabled selected> ... </option>
            <?php while($rows = mysqli_fetch_array($result)){
                $nome_paciente = $rows[0];
                $cartao_saude_paciente = $rows[1];
                $id_paciente = intval($rows[2]);
                ?>
                <option value="<?php echo $id_paciente ?>"> <?php echo $nome_paciente.",".$cartao_saude_paciente;  ?> </option>
            <?php } ?>
        </select>
        <p>Nome: <input type="text" name="nome"> </p>
        <p>Data de Nascimento: <input type="date" name="data_nascimento"</p>
        <p>Sexo:
            <input type="radio" id="F" name="sexo" value="F">
            <label for="F">Feminino </label>
            <input type="radio" id="M" name="sexo" value="M">
            <label for="M"> Masculino </label>
        </p>

        <p>Morada: <input type="text" name="morada"> </p>
        <p>Localidade: <input type="text" name="localidade"></p>
        <p>Distrito: <input type="text" name="distrito"</p>
        <p>Contacto: <input type="number" name="contacto"> </p>
        <p>Email: <input type="email" name="email"</p>
        <p>Cartão de Saúde: <input type="number" name="cartao_saude"</p>
        <p>Fotografia: <input type="file" name="foto"> </p>
        <p>Alergias: <input type="text" name="alergias"> </p>
        <p>NIF: <input type="number" name="nif"> </p>

        <input style=" font-size: large" class="w3-teal w3-button" type="submit" name="submit" value="Editar">
    </form>
</div>
<div class="w3-padding w3-container">
    <form method = "POST" action="index.php?action=registoConsulta">
        <input style=" font-size: large" class="w3-teal w3-button" type="submit" name="submit" value="Voltar">
    </form>
</div>
