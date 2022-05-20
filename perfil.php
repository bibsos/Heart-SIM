<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $query = "SELECT `Nome`, `Morada`, `Contactos`, `Fotografia` FROM `utilizador` WHERE utilizador.ID = $_SESSION('ID')";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
?>
<table>
    <tr>
        <td> Nome: <?php echo $row['Nome']; ?> </td>
</table>