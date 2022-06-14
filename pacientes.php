<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    $query_centro = "SELECT users.Centro_saude FROM users WHERE users.ID = '$id'";
    $centro_saude = mysqli_query($connect, $query_centro);
    $nome_centro_user = mysqli_fetch_array($centro_saude)[0];
    $query = "SELECT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patients AS p 
        LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
        WHERE p.Centro_saude = '$nome_centro_user' ";

    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));

?>

<table border="1">
<tr>
    <td> <a href="index.php?action=NovoPaciente"> Adicionar Paciente </a> </td>
</tr>
</table>
<table border="1">
<TR>
    <TH> Nome </TH>
    <TH> Contacto </TH>
    <TH> Cartão de Saúde </TH>
    <TH> </TH>
</TR>
    <?php
        for($i = 0; $i < count($result); $i++){
            $rows = mysqli_fetch_array($result);
            $id[$i] = $rows[3];
            $_SESSION['ID_pacientes'] = $id;
    ?>
<TR>
    <TD> <?php echo $rows[0]; ?> </TD>
    <TD> <?php echo $rows[1]; ?> </TD>
    <TD> <?php echo $rows[2]; ?> </TD>
    <TD> <form action="RegistarConsulta.php"> <input type="submit" name="submit" value="Adicionar Consulta"> </form> </TD>
</TR>
<?php } ?>
</table>