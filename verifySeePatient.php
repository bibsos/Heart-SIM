<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h3> Atender Paciente </h3>
</div>

<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));

if(isset($_POST['submit_rel'])){
    $id = $_POST['id_atend_paciente'];
    $relatorio = $_POST['relatorio'];


    $query = "UPDATE `episodio_clinico` SET Data_Atendimento = CURRENT_TIMESTAMP, Relatorio = '$relatorio'
            WHERE ID_paciente = '$id'";
    if (mysqli_query($connect, $query)) {
        echo("Atendimento terminado com sucesso!");
    }
    else {
        echo "Erro a terminar o atendimento:" . mysqli_error($connect);
    }


}

?>
<form type="POST" action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar" style=" font-size: large" class="w3-teal w3-button"> </form>






