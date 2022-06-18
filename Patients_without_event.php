<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    echo $id;
    $query_centro = "SELECT users.Instituicao FROM users WHERE users.ID = '$id'";
    $result_centro = mysqli_query($connect, $query_centro);
    $centro_saude = mysqli_fetch_array($result_centro)[0];
    echo $centro_saude;
    $query = "SELECT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p 
        LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
        WHERE p.Centro_saude = '$centro_saude' ";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
?>
<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1> Registo de consultas </h1>
</div>

<div class="w3-row-padding w3-margin" >
<!-- <table >
    <tr>
        <td class="w3-button w3-bar-item w3-light-grey"> <a href="index.php?action=novoPaciente"> Adicionar Paciente </a> </td>
        <td class="w3-button w3-bar-item w3-light-grey"> <a href="index.php?action=novaConsulta"> Adicionar Consulta </a> </td>
        <td class="w3-button w3-bar-item w3-light-grey"> <a href="index.php?action=apagarPaciente"> Apagar Paciente </a> </td>
    </tr>
</table> -->
   <a>
            <a class="w3-button w3-bar-item w3-light-grey" href="index.php?action=novoPaciente"> Adicionar Paciente </a>
            <a class="w3-button w3-bar-item w3-light-grey" href="index.php?action=novaConsulta"> Adicionar Consulta </a>
            <a class="w3-button w3-bar-item w3-light-grey" href="index.php?action=apagarPaciente"> Apagar Paciente </a>
   </a>
</div>

<div class="w3-row-padding w3-margin" >

<table class="w3-table w3-striped w3-bordered w3-hoverable w3-responsive w3-center w3-large">
    <TR class="w3-light-grey">
        <TH> Nome </TH>
        <TH> Contacto </TH>
        <TH> Cartão de Saúde </TH>
    </TR>
    <?php
        while($rows = mysqli_fetch_array($result)){
           ?>
    <TR>
        <TD class="w3-text-black"> <?php echo $rows[0]; ?> </TD>
        <TD class="w3-text-black"> <?php echo $rows[1]; ?> </TD>
        <TD class="w3-text-black"> <?php echo $rows[2]; ?> </TD>
    </TR>
    <?php } ?>
</table>
</div>