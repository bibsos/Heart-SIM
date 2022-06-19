<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $ID = $_SESSION['ID'];
    $query = "SELECT `Nome`, `Morada`, `Contacto`, `Fotografia`, `username` FROM `users` AS u WHERE u.ID = $ID";
    $result = mysqli_query($connect, $query) or die('The query failed'.mysqli_error($connect));
    $row = mysqli_fetch_array($result);

?>

<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Perfil </h1>
</div>
<!--<table >
    <tr> <td> Nome: <?php echo $row['Nome']; ?> </td> </tr>
    <tr> <td> Morada: <?php echo $row['Morada']; ?> </td> </tr>
    <tr> <td> Contacto: <?php echo $row['Contacto']; ?> </td></tr>
    <tr> <td> Fotografia: <?php echo $row['Fotografia']; ?> </td> </tr>
    <tr> <td> Username:  <?php echo $row['username']; ?> </td></tr>
    <td> <form action="updateProfile.php"> <input type="submit" name="submit" value="Editar"> </form>  </td>
</table>-->

<div class="w3-padding w3-margin">
    <table class="w3-table" >
        <tr style=" font-size: large"> <td> <b> Nome: </b> <?php echo $row[0]; ?> </td> </tr>
        <tr style=" font-size: large"> <td> <b> Morada: </b> <?php echo $row[1]; ?> </td> </tr>
        <tr style=" font-size: large"> <td> <b> Contacto: </b> <?php echo $row[2]; ?> </td></tr>
        <tr style=" font-size: large"> <td> <b> Fotografia: </b> <?php echo $row[3]; ?> </td> </tr>
        <tr style=" font-size: large"> <td> <b> Username: </b>  <?php echo $row[4]; ?> </td></tr>
        <!--<td class="w3-button"> <form action="updateProfile.php"> <button class="w3-btn w3-teal" type="submit" name="submit" value="Editar">Editar</button> </form>  </td>-->
        <tr><td> <form method="POST" action="index.php?action=atualizar_Perfil">
                    <input style=" font-size: large" type="submit" name="submit" value="Editar" class="w3-teal w3-button">
                </form>  </td> </tr>
    </table>

</div>
