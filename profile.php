<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $ID = $_SESSION['ID'];
    $query = "SELECT `Nome`, `Morada`, `Contacto`, `Fotografia`, `username` FROM `utilizador` AS u WHERE u.ID = $ID";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
    $row = mysqli_fetch_array($result);

?>
<div class="w3-row-padding w3-padding-64 w3-container">
<table >
    <tr> <td> Nome: <?php echo $row['Nome']; ?> </td> </tr>
    <tr> <td> Morada: <?php echo $row['Morada']; ?> </td> </tr>
    <tr> <td> Contacto: <?php echo $row['Contacto']; ?> </td></tr>
    <tr> <td> Fotografia: <?php echo $row['Fotografia']; ?> </td> </tr>
    <tr> <td> Username:  <?php echo $row['username']; ?> </td></tr>
    <td> <form action="index.php?action=updateProfile"> <input type="submit" name="submit" value="Edit"> </form>  </td>
</table>
</div>
<form
