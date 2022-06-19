<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    if(isset($_POST['submit'])) {
        $id = strval($_POST['id_paciente']);
        echo $id;
        $query = "DELETE FROM `patient` WHERE ID = '$id'";
        if(mysqli_query($connect, $query)){
            echo "Paciente eliminado com sucesso!";
        }
        else{
            echo "Erro";
        }
    }
?>
    <form method = "POST" action="index.php?action=registoConsulta">
        <input style=" font-size: large" class="w3-teal w3-button" type="submit" name="submit" value="Voltar">
    </form>






