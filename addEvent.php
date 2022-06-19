<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    //$id = "2";
    $query_centro = "SELECT users.Instituicao FROM users WHERE users.ID = '$id'";
    $centro_saude = mysqli_query($connect, $query_centro);
    $nome_centro_user = mysqli_fetch_array($centro_saude)[0];
    echo $nome_centro_user;
    echo $id;
    $query = "SELECT p.Nome AS 'Paciente', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p 
            LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
            WHERE p.Centro_saude = '$nome_centro_user'";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
    echo count($result);
?>

<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Nova Consulta </h1>
</div>

<div class="w3-padding w3-container">
<form method = "POST" action="index.php?action=verifyAddEvent">
    <p><label for = "paciente" style=" font-size: large"> <b> Selecione o paciente: </b> </label> </p>
    <select class="w3-select" name="paciente" id="paciente">
        <option value="" disabled selected> Escolha o paciente </option>
        <?php while($rows = mysqli_fetch_array($result)){
            $nome_paciente = $rows[0];
            $cartao_saude_paciente = $rows[1];
            $id_paciente = intval($rows[2]);
        ?>
        <option  value="<?php echo $id_paciente ?>"> <?php echo $nome_paciente.",".$cartao_saude_paciente;  ?> </option>
        <?php } ?>
    </select>
    <p style=" font-size: large"> <b> NYHA: </b> <input class="w3-input"  type="number" name="nyha"</p>
    <p style=" font-size: large"> <b> Angor: </b> <input class="w3-input"  type="number" name="angor"> </p>
    <p style=" font-size: large"> <b> Sincope: </b> <input class="w3-input"  type="number" name="sincope"></p>
    <p style=" font-size: large"> <b> Dispneia: </b> <input class="w3-input"  type="number" name="dispneia"</p>
    <p style=" font-size: large"> <b> Pressão Arterial: </b> <input class="w3-input"  type="number" name="pressao_arterial"> </p>
    <p style=" font-size: large"> <b> Edema Periférico: </b> <input class="w3-input"  type="number" name="edema_periferico"</p>
    <p style=" font-size: large"> <b> Crepitações: </b> <input class="w3-input"  type="number" name="crepitacoes"</p>
    <p style=" font-size: large"> <b> Creatinina: </b> <input class="w3-input"  type="number" name="creatinina"> </p>
    <p style=" font-size: large"> <b> Hemoglobina: </b> <input class="w3-input"  type="number" name="hemoglobina"> </p>
    <p style=" font-size: large"> <b> Ejeção VE: </b> <input class="w3-input"  type="number" name="ejecao_ve"> </p>
    <p style=" font-size: large"> <input type="submit" name="submit" value="Criar Consulta" class="w3-teal w3-button"></p>
</form>
</div>