<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Nova Consulta </h1>
</div>

<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    if(isset($_POST['submit'])) {
        $ID = $_SESSION['ID'];
        $id_paciente = $_POST['paciente'];
        $nyha = $_POST['nyha'];
        $angor = $_POST['angor'];
        $sincope = $_POST['sincope'];
        $dispneia = $_POST['dispneia'];
        $pa = $_POST['pressao_arterial'];
        $edema = $_POST['edema_periferico'];
        $crepitacoes = $_POST['crepitacoes'];
        $creatinina = $_POST['creatinina'];
        $hemoglobina = $_POST['hemoglobina'];
        $ejecao_ve = $_POST['ejecao_ve'];
        $class=0;

    // Terminal Node 1
    if ($pa <= 89.5){
        $class = 1;
    }

    //Terminal Node 2
    if($pa > 89.5 && $nyha <= 1.5 && $hemoglobina <= 1.5 && $crepitacoes <= 3.5){
        $class = 4;
    }

    // Terminal Node 3
    if($pa > 89.5 && $nyha <= 1.5 && $hemoglobina <= 1.5 && $crepitacoes > 3.5 && $angor <= 2.5){
        $class = 4;
    }

    // Terminal Node 4
    if($pa > 89.5 && $nyha <= 1.5 && $hemoglobina <= 1.5 && $crepitacoes > 3.5 && $angor > 2.5 && $edema <= 1.5){
        $class = 2;
    }

    // Terminal Node 5
    if($pa > 89.5 && $nyha <= 1.5 && $hemoglobina <= 1.5 && $crepitacoes > 3.5 && $angor > 2.5 && $edema > 1.5){
        $class = 4;
    }

    // Terminal Node 6
    if($pa > 89.5 && $nyha <= 1.5 && $hemoglobina > 1.5){
        $class = 2;
    }

    // Terminal Node 7
    if($pa > 89.5 && $nyha > 1.5 && $nyha <= 2.5 && $hemoglobina <= 1.5 && $crepitacoes <= 0.5 && $edema <= 0.5){
        $class = 4;
    }

    // Terminal Node 8
    if($pa > 89.5 && $nyha > 1.5 && $nyha <= 2.5 && $hemoglobina <= 1.5 && $crepitacoes <= 0.5 && $edema > 0.5){
        $class = 3;
    }

    // Terminal Node 9
    if($pa > 89.5 && $nyha > 1.5 && $nyha <= 2.5 && $hemoglobina <= 1.5 && $crepitacoes > 0.5 && $crepitacoes <= 3.5){
        $class = 3;
    }

    // Terminal Node 10
    if($pa > 89.5 && $nyha > 1.5 && $nyha <= 2.5 && $hemoglobina <= 1.5 && $crepitacoes > 3.5 && $edema <= 0.5){
        $class = 3;
    }

    // Terminal Node 11
    if($pa > 89.5 && $nyha > 1.5 && $nyha <= 2.5 && $hemoglobina <= 1.5 && $crepitacoes > 3.5 && $edema > 0.5 && $edema <= 1.5){
        $class = 2;
    }

    // Terminal Node 12
    if($pa > 89.5 && $nyha > 1.5 && $nyha <= 2.5 && $hemoglobina <= 1.5 && $crepitacoes > 3.5 && $edema > 1.5){
          $class = 3;
    }

    // Terminal Node 13
    if($pa > 89.5 && $nyha > 1.5 && $nyha <= 2.5 && $hemoglobina > 1.5){
        $class = 2;
    }

    // Terminal Node 14
    if($pa > 89.5 && $angor <= 0.5 && $nyha > 2.5 && $nyha <= 3.5 && $sincope <= 0.5 && $dispneia <= 0.5){
        $class = 3;
    }

    // Terminal Node 15
    if($pa > 89.5 && $angor <= 0.5 && $nyha > 2.5 && $nyha <= 3.5 && $sincope <= 0.5 && $dispneia > 0.5){
        $class = 2;
    }

    // Terminal Node 16
    if($pa > 89.5 && $angor <= 0.5 && $nyha > 2.5 && $nyha <= 3.5 && $sincope > 0.5){
        $class = 2;
    }

    // Terminal Node 17
    if($pa > 89.5 && $angor <= 0.5 && $nyha > 3.5){
        $class = 2;
    }

    // Terminal Node 18
    if($pa> 89.5 && $nyha > 2.5 && $angor > 0.5){
        $class = 2;
    }
?>
<div>
    <form method="POST">
    <table>
        <tr>
            <td> Classificação sugerida </td>
            <td> Classificação final </td>
        </tr>
        <tr>
            <td> <?php echo $class; ?> </td>
            <td> <input type="number" id="class_final" name="class_final"> </td>
        </tr>
        <tr>
            <td colspan="2"> <input type="submit" name="submit_confirmar" value="Confirmar classificação"> </td>
        </tr>
    </table>
    </form>

</div>

<?php
        if(isset($_POST['submit_confirmar'])){
            echo("entrei");
            ?>
            <br>
            <?php
        $class_final = $_POST['class_final'];
        $query = "INSERT INTO `episodio_clinico`(`ID_utilizador`, `ID_paciente`, `Classificacao`, `Data_consulta`, `Data_Atendimento`, `Relatorio`, `NYHA`, `Angor`, `Sincope`, `Dispneia`, `Pressao_arterial`, `Edema_periferico`, `Crepitacoes`, `Creatinina`, `Hemoglobina`, `Ejecao_VE`)
            VALUES ('$ID','$id_paciente','$class_final',NULL,NULL,NULL,'$nyha','$angor','$sincope','$dispneia','$pa','$edema','$crepitacoes','$creatinina','$hemoglobina','$ejecao_ve')";
        if (mysqli_query($connect, $query)) {
                echo("Consulta adicionada!");
            }
        else {
            echo "Erro a adicionar consulta:" . mysqli_error($connect);
        }
        }
    }

?>
<br>
<form action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar"> </form>

