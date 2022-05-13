<?php
$connect = mysqli_connect('localhost', 'root', '','SIM')
or die('Error connecting to the server: ' . mysqli_error($connect));
$sql = "SELECT `Nome`, `Contato`, `Cartao Saude`, `Classificacao`  FROM `paciente`, `episodio_clinico` WHERE paciente.ID = episodio_clinico.ID_paciente AND utilizador.ID = episodio_clinico.ID_utilizador AND utilizador.ID = $_SESSION('ID')";
$result = mysqli_query($connect, $sql) or die('The query failed'.mysqli_error($connect));
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
        <TD> <?php echo $rows['Contato']; ?> </TD>
        <TD> <?php echo $rows['Cartao Saude']; ?> </TD>
        <TD> <?php echo $rows['Classificacao']; ?> </TD>
    </TR>
    <?php } ?>
</table>