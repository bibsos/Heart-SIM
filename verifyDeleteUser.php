<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1> Apagar Utilizador </h1>
</div>
<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
if(isset($_POST['submit1'])) {
    $id = strval($_POST['user']);
    $query = "DELETE FROM `users` WHERE ID = '$id'";
    if($result = mysqli_query($connect, $query)){
        echo("Utilizador eliminado com sucesso!");
    }
    else{
        echo "Erro a eliminar o utilizador:" . mysqli_error($connect);
    }
}
?>
<form action="index.php?action=listUsers">
    <input type="submit" name="submit" value="Voltar">
</form>