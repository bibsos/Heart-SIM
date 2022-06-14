<?php
    include('pacientes.php');
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
   // $id_user = $_SESSION['ID'];
    $query = "SELECT patients.Nome, patients.ID FROM `patients` WHERE patients.Centro_saude = '$nome_centro_user'";
    $result = mysqli_query($connect, $query);
?>
<form method = "POST" action="verifyAddEvent.php">
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