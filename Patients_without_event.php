<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    print '<pre>';
    var_dump($id);
    print '</pre>';

    $query_centro = "SELECT users.Centro_saude FROM users WHERE users.ID = '$id'";
    $result_centro = mysqli_query($connect, $query_centro);
    $centro_saude = mysqli_fetch_array($result_centro)[0];
    $query = "SELECT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p 
        LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
        WHERE p.Centro_saude = '$centro_saude' ";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
?>

<table border="1">
    <tr>
        <td> <a href="index.php?action=novoPaciente"> Adicionar Paciente </a> </td>
        <td> <a href="index.php?action=novaConsulta"> Adicionar Consulta </a> </td>
    </tr>
</table>
<table border="1">
    <TR>
        <TH> Nome </TH>
        <TH> Contacto </TH>
        <TH> Cartão de Saúde </TH>
    </TR>
    <?php
        while($rows = mysqli_fetch_array($result)){
           ?>
    <TR>
        <TD> <?php echo $rows[0]; ?> </TD>
        <TD> <?php echo $rows[1]; ?> </TD>
        <TD> <?php echo $rows[2]; ?> </TD>
    </TR>
    <?php } ?>
</table>