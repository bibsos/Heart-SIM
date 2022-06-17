<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $ID = $_SESSION['ID'];
    $query = "SELECT `Nome`, `Morada`, `Contacto`, `Fotografia`, `username` FROM `users` AS u WHERE u.ID = $ID";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
    $row = mysqli_fetch_array($result);

?>
<div class="w3-row-padding w3-padding-64 w3-container">
    <h1>  Perfil </h1>
<!--<table >
    <tr> <td> Nome: <?php echo $row['Nome']; ?> </td> </tr>
    <tr> <td> Morada: <?php echo $row['Morada']; ?> </td> </tr>
    <tr> <td> Contacto: <?php echo $row['Contacto']; ?> </td></tr>
    <tr> <td> Fotografia: <?php echo $row['Fotografia']; ?> </td> </tr>
    <tr> <td> Username:  <?php echo $row['username']; ?> </td></tr>
    <td> <form action="updateProfile.php"> <input type="submit" name="submit" value="Editar"> </form>  </td>
</table>-->

    <table >
        <tr> <td> Nome: <?php echo $row[0]; ?> </td> </tr>
        <tr> <td> Morada: <?php echo $row[1]; ?> </td> </tr>
        <tr> <td> Contacto: <?php echo $row[2]; ?> </td></tr>
        <tr> <td> Fotografia: <?php echo $row[3]; ?> </td> </tr>
        <tr> <td> Username:  <?php echo $row[4]; ?> </td></tr>
        <td> <form action="updateProfile.php"> <input type="submit" name="submit" value="Editar"> </form>  </td>
    </table>

</div>
