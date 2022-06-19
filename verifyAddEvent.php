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
        <form method="POST" action="index.php?action=insertEvent">
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
            <input type="hidden" name="id_paciente" value="<?php echo $id_paciente ?>">
            <input type="hidden" name="nyha" value="<?php echo $nyha ?>">
            <input type="hidden" name="sincope" value="<?php echo $sincope ?>">
            <input type="hidden" name="dispneia" value="<?php echo $dispneia ?>">
            <input type="hidden" name="angor" value="<?php echo $angor ?>">
            <input type="hidden" name="pa" value="<?php echo $pa ?>">
            <input type="hidden" name="edema" value="<?php echo $edema ?>">
            <input type="hidden" name="crepitacoes" value="<?php echo $crepitacoes ?>">
            <input type="hidden" name="creatinina" value="<?php echo $creatinina ?>">
            <input type="hidden" name="hemoglobina" value="<?php echo $hemoglobina ?>">
            <input type="hidden" name="ejecao_ve" value="<?php echo $ejecao_ve ?>">
        </form>
    </div>
<?php } ?>
<br>
<form action="index.php?action=registoConsulta"> <input type="submit" name="submit" value="Voltar" style=" font-size: large" class="w3-teal w3-button"> </form>

