<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));

$query = "SELECT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', u.Nome AS 'Doutor', e.Classificacao AS 'Avaliação' FROM paciente AS p 
    INNER JOIN episodio_clinico AS e ON e.ID_paciente=p.ID 
    INNER JOIN utilizador AS u ON $_SESSION('ID')=e.ID_utilizador; ";


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
        <TD> <?php echo $rows['Nome']; ?> </TD>
        <TD> <?php echo $rows['Contacto']; ?> </TD>
        <TD> <?php echo $rows['Cartao_saude']; ?> </TD>
        <TD> <?php echo $rows['Classificacao']; ?> </TD>
    </TR>
    <?php } ?>
</table>