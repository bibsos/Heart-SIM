<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));

    $query = "";
    if(isset($_GET['submit'])){
    if(isset($_GET['username'])){
        $username = $_GET['username'];
        $query = "SELECT u.Tipo, u.Nome, u.Morada, u.Contacto, u.Fotografia, u.username FROM users AS u 
        WHERE u.username = '$username'";
    }
    $row = mysqli_query($connect, $query);
    echo $row[0];
    if(mysqli_num_rows($row) != 1) {
        die("Esse utilizador não existe!");
    }
?>
<div class="w3-row-padding w3-padding-64 w3-container">
    <h1>  Perfil de <?php $row[1]?> </h1>
    <table >
        <tr> <td> Tipo: <?php echo $row[0]; ?> </td></tr>
        <tr> <td> Nome: <?php echo $row[1]; ?> </td> </tr>
        <tr> <td> Morada: <?php echo $row[2]; ?> </td> </tr>
        <tr> <td> Contacto: <?php echo $row[3]; ?> </td></tr>
        <tr> <td> Fotografia: <?php echo $row[4]; ?> </td> </tr>
        <tr> <td> Username:  <?php echo $row[5]; ?> </td></tr>
        <td> <form action="index.php?action=updateProfile"> <input type="submit" name="submit" value="Editar"> </form>  </td>
    </table>

</div>
<?php
    }
    ?>