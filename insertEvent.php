<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Nova Consulta </h1>
</div>

<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));

if(isset($_POST['submit_confirmar'])){
    $ID = $_SESSION['ID'];
        $id_paciente = $_POST['id_paciente'];
        $nyha = $_POST['nyha'];
        $angor = $_POST['angor'];
        $sincope = $_POST['sincope'];
        $dispneia = $_POST['dispneia'];
        $pa = $_POST['pa'];
        $edema = $_POST['edema'];
        $crepitacoes = $_POST['crepitacoes'];
        $creatinina = $_POST['creatinina'];
        $hemoglobina = $_POST['hemoglobina'];
        $ejecao_ve = $_POST['ejecao_ve'];
        $class_final = $_POST['class_final'];
    ?>
    <br>
    <?php
    $query = "INSERT INTO `episodio_clinico`(`ID_utilizador`, `ID_paciente`, `Classificacao`, `Data_consulta`, `Data_Atendimento`, `Relatorio`, `NYHA`, `Angor`, `Sincope`, `Dispneia`, `Pressao_arterial`, `Edema_periferico`, `Crepitacoes`, `Creatinina`, `Hemoglobina`, `Ejecao_VE`)
            VALUES ('$ID','$id_paciente','$class_final',CURRENT_TIMESTAMP ,NULL,NULL,'$nyha','$angor','$sincope','$dispneia','$pa','$edema','$crepitacoes','$creatinina','$hemoglobina','$ejecao_ve')";
    if (mysqli_query($connect, $query)) {
        echo("Consulta adicionada!");
    }
    else {
        echo "Erro a adicionar consulta:" . mysqli_error($connect);
    }
}
?>
<div>
<form action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar"> </form>
</div>
