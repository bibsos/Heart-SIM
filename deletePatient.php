<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    $centro_saude = $_SESSION['instituicao'];
    $query = "SELECT p.Nome AS 'Paciente', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p 
           LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
           WHERE p.Centro_saude = '$centro_saude'";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
?>

<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Apagar paciente </h1>
</div>

<div class="w3-padding w3-container">
    <form method = "POST" action="index.php?action=verifyDeletePatient">
        <p><label for = "id" style=" font-size: large"> <b> Selecione o paciente: </b> </label> </p>
        <select class="w3-select" name="id" id="id">
            <option value="" disabled selected> Escolha o paciente </option>
            <?php while($rows = mysqli_fetch_array($result)){
                $nome_paciente = $rows[0];
                $cartao_saude_paciente = $rows[1];
                $id_paciente = intval($rows[2]);
            ?>
            <option value="<?php echo $id_paciente ?>"> <?php echo $nome_paciente.",".$cartao_saude_paciente;  ?> </option>
            <?php } ?>
        </select>
        <input style=" font-size: large" class="w3-teal w3-button" type="submit" name="submit" value="Apagar">
    </form>
</div>
<div class="w3-padding w3-container">
    <form method = "POST" action="index.php?action=registoConsulta">
        <input style=" font-size: large" class="w3-teal w3-button" type="submit" name="submit" value="Voltar">
    </form>
</div>