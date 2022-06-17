<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM users AS u";
    $result = mysqli_query($connect, $query);
?>

<div class="w3-row-padding w3-padding-64 w3-container">
    <h1>  Utilizadores </h1>
<table border="1">
    <tr>
        <td> <a href="index.php?action=adicionarUtilizador"> Adicionar Utilizador </a> </td>
        <td> <a href="index.php?action=apagarPaciente"> Apagar Utilizador </a> </td>
    </tr>
</table> <br>

<form method="GET" action="searchUser.php">
    <h3> Procurar por: </h3>
    <table>
        <tr>
            <td> Primeiro Nome: <input type="text" id="firstname" name="firstname"> </td>
            <td> Apelido: <input type="text" id="surname" name="surname"></td>
            <td> Username: <input type="text" id="username" name="username"></td>
        </tr>
        <tr>
            <td> <input type="submit" id="submit_search" name="submit_search" value="Procurar"></td>
        </tr>
    </table>
</form>
<form method="GET" action="seeProfile.php">
    <h3> Ver perfil: </h3>
    <table>
        <tr>
            <td> Username: <input type="text" id="username" name="username"></td>
        </tr>
        <tr>
            <td> <input type="submit" id="submit" name="submit" value="Procurar"></td>
        </tr>
    </table>
</form>
<div>
    <table border="1">
        <TR>
            <TH> Tipo </TH>
            <TH> Nome </TH>
            <TH> Instituição </TH>
        </TR>
        <?php
            while($rows = mysqli_fetch_array($result)){
               ?>
        <TR>
            <TD> <?php echo $rows['Tipo']; ?> </TD>
            <TD> <?php echo $rows['Nome']; ?> </TD>
            <TD> <?php echo $rows['Instituicao']; ?> </TD>
        </TR>
        <?php } ?>
    </table>
</div>


