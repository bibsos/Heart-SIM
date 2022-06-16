<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $query = "SELECT u.Tipo, u.Nome FROM users AS u";
    $result = mysqli_query($connect, $query);
?>

<div class="w3-row-padding w3-padding-64 w3-container">
    <h1>  Utilizadores </h1>
<table border="1">
    <tr>
        <td> <a href="index.php?action=adicionarUtilizador"> Adicionar Utilizador </a> </td>
        <td> <a href="index.php?action=updateProfile"> Editar Utilizador </a> </td>
        <td> <a href="index.php?action=apagarPaciente"> Apagar Utilizador </a> </td>
    </tr>
</table> <br>
<table border="1">
    <TR>
        <TH> Tipo </TH>
        <TH> Nome </TH>
    </TR>
    <?php
        while($rows = mysqli_fetch_array($result)){
           ?>
    <TR>
        <TD> <?php echo $rows[0]; ?> </TD>
        <TD> <?php echo $rows[1]; ?> </TD>
    </TR>
    <?php } ?>
</table>
</div>