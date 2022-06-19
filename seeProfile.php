<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $utilizador = $_SESSION['utilizador'];
    $query = "";
if(isset($_POST['submit_profile'])){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $query = "SELECT u.Tipo, u.Nome, u.Morada, u.Contacto, u.Fotografia, u.username, u.ID FROM users AS u 
                WHERE u.username = '$username'";
    }
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) != 1) {
        mysqli_error("Esse utilizador não existe!");
    }
    else{
        $user = mysqli_fetch_array($result);
        ?>
        <div class="w3-row-padding w3-padding-64 w3-container">
            <h1>  Perfil de <?php echo $user[1]?> </h1>
            <table >
                <tr> <td> Tipo: <?php echo $user[0]; ?> </td></tr>
                <tr> <td> Nome: <?php echo $user[1]; ?> </td> </tr>
                <tr> <td> Morada: <?php echo $user[2]; ?> </td> </tr>
                <tr> <td> Contacto: <?php echo $user[3]; ?> </td></tr>
                <tr> <td> Fotografia: <?php echo $user[4]; ?> </td> </tr>
                <tr> <td> Username:  <?php echo $user[5]; ?> </td></tr>
            </table>
            <form method="POST" action="index.php?action=atualizar_Perfil">
                <input type="hidden" value="<?php echo $user[6]?>" name="id_profile" id="id_profile">
                <input type="submit" name="submit" value="Editar"> </form>
        </div>
        <?php
    }
}
?>
<form action="index.php?action=listUsers"> <input type="submit" name="submit" value="Voltar"> </form>