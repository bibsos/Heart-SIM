<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $ID = $_SESSION['ID'];
    $query = "SELECT `Nome`, `Morada`, `Contactos`, `Fotografia` FROM `utilizador` AS u WHERE u.ID = $ID";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
    $row = mysqli_fetch_array($result);

?>
<table >
    <tr> <td> Nome: <?php echo $row['Nome']; ?> </td> </tr>
    <tr> <td> Morada: <?php echo $row['Morada']; ?> </td> </tr>
    <tr> <td> Contacto: <?php echo $row['Contactos']; ?> </td></tr>
    <tr> <td> Fotografia: <?php echo $row['Fotografia']; ?> </td> </tr>
</table>

