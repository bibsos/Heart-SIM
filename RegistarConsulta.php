<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    //$id = $_SESSION['ID'];
    $id="2";
    //$query_centro = "SELECT users.Centro_saude FROM users WHERE users.ID = '$id'";
    //$centro_saude = mysqli_query($connect, $query_centro);
    //$nome_centro_user = mysqli_fetch_array($centro_saude)[0];
    $nome_centro_user = "Charneca de Caparica";
    $query = "SELECT p.Nome AS 'Paciente', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p 
            LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
            WHERE p.Centro_saude = '$nome_centro_user' ";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
    echo count($result);
?>
<form method = "POST" action="verifyAddEvent.php">
    <label for = "paciente"> Selecione o paciente: </label>
    <select name="paciente" id="paciente">
        <?php for($i = 0; $i < count($result); $i++){
            $rows = mysqli_fetch_array($result);
            $nome_paciente = $rows[0];
            $cartao_saude_paciente = $rows[1];
            $id_paciente = $rows[2];
        ?>
        <option value="<?php $id_paciente ?>"> <?php echo $nome_paciente.",".$cartao_saude_paciente;  ?> </option>
        <?php } ?>
    </select>
    <p>NYHA <input type="number" name="nyha"</p>
    <p>Angor: <input type="number" name="angor"> </p>
    <p>Sincope <input type="number" name="sincope"></p>
    <p>Dispneia <input type="number" name="dispneia"</p>
    <p>Pressão Arterial: <input type="number" name="pressao_arterial"> </p>
    <p>Edema Periférico: <input type="number" name="edema_periferico"</p>
    <p>Crepitações: <input type="number" name="crepitacoes"</p>
    <p>Creatinina: <input type="number" name="creatinina"> </p>
    <p>Hemoglobina: <input type="number" name="hemoglobina"> </p>
    <p>Ejeção VE: <input type="number" name="ejecao_ve"> </p>
    <p> <input type="submit" name="submit" value="Criar Consulta"></p>
</form>
