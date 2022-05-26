<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    $query = "SELECT DISTINCT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', e.Classificacao AS 'Avaliação' FROM paciente AS p 
    INNER JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
    WHERE $id = e.ID_utilizador";

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
    <TH> Classificação </TH>
    <?php
    while($rows = mysqli_fetch_array($result)){


    ?>
<TR>

    <TD> <?php echo $rows[0]; ?> </TD>
    <TD> <?php echo $rows[1]; ?> </TD>
    <TD> <?php echo $rows[2]; ?> </TD>
    <TD> <?php echo $rows[3]; ?> </TD>
</TR>
<?php } ?>
</table>