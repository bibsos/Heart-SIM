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

<div class="w3-padding w3-margin">
    <table class="w3-table" >
        <tr style=" font-size: large"> <td> <b> Nome: </b> <?php echo $row[0]; ?> </td> </tr>
        <tr style=" font-size: large"> <td> <b> Morada: </b> <?php echo $row[1]; ?> </td> </tr>
        <tr style=" font-size: large"> <td> <b> Contacto: </b> <?php echo $row[2]; ?> </td></tr>
        <!-- <tr style=" font-size: large"> <td> <b> Fotografia: </b> <?php echo $row[3]; ?> </td> </tr> -->
        <tr style=" font-size: large"> <td> <b> Fotografia: </b>
                <?php if (!is_null($row[3])){?>
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row[3]); ?> "> <?php }
                else{ ?>
                    <img src="Screenshot%20(250).png" width="200" height="200">
                <?php } ?> </td> </tr>
        <tr style=" font-size: large"> <td> <b> Username: </b>  <?php echo $row[4]; ?> </td></tr>
        <tr><td> <form method="POST" action="index.php?action=atualizar_Perfil">
                    <input type="hidden" value="<?php echo $ID?>" name="id_profile" id="id_profile">
                    <input style=" font-size: large" type="submit" name="submit" value="Editar" class="w3-teal w3-button">
                </form>  </td> </tr>
    </table>

</div>
