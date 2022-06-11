<?php
    include(index.php);
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $id_user = $_SESSION['ID'];
    $query_centro = "SELECT 'Centro_saude' FROM 'utilizador' WHERE ID = $id_user";
    $centro_saude = mysqli_query($connect, $query_centro);
    $query = "SELECT 'Nome' FROM 'paciente' WHERE 'Centro_saude' = $centro_saude";
    $result = mysqli_query($connect, $query);
?>
<table border="1">
    <TR>
        <TH> Pacientes </TH>
        <?php
        while($rows = mysqli_fetch_array($result)){
        ?>
    <TR>

        <TD> <?php echo $rows[0]; ?> </TD>
    </TR>
    <?php } ?>
</table>


<form method="POST" action="verifyAddEvent.php">
    <p>Paciente: <input type="text" name="nome"> </p>
</form>

<?php
    $query = hh
?>

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
    <p>Fotografia: <input type="file" name="foto"> </p>
    <p>Alergias: <input type="text" name="alergias"> </p>
    <p>NIF: <input type="number" name="nif"> </p>
    <p> <input type="submit" name="submit" value="Adicionar Paciente"></p>
</form>
