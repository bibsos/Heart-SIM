<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    $centro = $_SESSION["centro_saude"];
    echo $id;
    echo $centro;
    //$id = "2";
    $query_centro = "SELECT users.Centro_saude FROM users WHERE users.ID = '$id'";
    $centro_saude = mysqli_query($connect, $query_centro);
    $nome_centro_user = mysqli_fetch_array($centro_saude)[0];
    $query = "SELECT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', p.ID AS 'ID' FROM patient AS p 
        LEFT JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
        WHERE p.Centro_saude = '$nome_centro_user' ";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
?>

<table border="1">
    <tr>
        <td> <form action="index.php?action=novoPaciente"> <input type="submit" name="submit" value="Adicionar Paciente"> </form>  </td>
        <td> <form action="index.php?action=RegistarConsulta"> <input type="submit" name="submit" value="Adicionar Consulta"> </form> </td>
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