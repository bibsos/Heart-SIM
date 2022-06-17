<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    $query_centro = "SELECT users.Instituicao FROM users WHERE users.ID = '$id'";
    $result_centro = mysqli_query($connect, $query_centro);
    $centro_saude = mysqli_fetch_array($result_centro)[0];
    $query = "SELECT p.Nome AS 'Paciente', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p 
           LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
           WHERE p.Instituicao = '$centro_saude'";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
?>
<div class="w3-row-padding w3-padding-64 w3-container">
    <h1>  Apagar paciente </h1>
<form method = "POST" action="verifyDeletePatient.php">
    <label for = "id"> Selecione o paciente: </label>
    <select name="id" id="id">
        <?php while($rows = mysqli_fetch_array($result)){
            $nome_paciente = $rows[0];
            $cartao_saude_paciente = $rows[1];
            $id_paciente = intval($rows[2]);
        ?>
        <option value="<?php $id_paciente ?>"> <?php echo $nome_paciente.",".$cartao_saude_paciente;  ?> </option>
        <?php } ?>
    </select>
    <input type="submit" name="submit" value="Apagar">
</form>
<form action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar"> </form>
</div>