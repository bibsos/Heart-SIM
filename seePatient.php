<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$id = $_SESSION['ID'];
$utilizador = $_SESSION['utilizador'];
$query_mhc = "SELECT p.Nome, p.Centro_saude, p.Cartao_saude, e.Classificacao, e.Data_consulta, p.ID FROM patient AS p
            INNER JOIN episodio_clinico AS e ON e.ID_paciente = p.ID
            WHERE e.Classificacao = '1' AND e.Relatorio IS NULL LIMIT 20 ";
$query_mhd = "SELECT p.Nome, p.Centro_saude, p.Cartao_saude, e.Classificacao, p.ID FROM patient AS p
            INNER JOIN episodio_clinico AS e ON e.ID_paciente = p.ID
            WHERE (e.Classificacao = '2' OR e.Classificacao = '3') AND e.Relatorio IS NULL LIMIT 20";
?>

<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Atender paciente </h1>
</div>

<div class="w3-padding w3-container">
    <form method = "POST" >
        <p><label for = "id" style=" font-size: large"> <b> Selecione o paciente: </b> </label> </p>
        <select class="w3-select" name="id" id="id">
            <option value="" disabled selected> Escolha o paciente </option>
            <?php
            if($utilizador == 'MHC'){
                $result_mhc = mysqli_query($connect, $query_mhc);
                while($rows_mhc = mysqli_fetch_array($result_mhc)){
                    $nome_p_mhc = $rows_mhc[0];
                    $centro_saude_p_mhc = $rows_mhc[1];
                    $cartao_saude_p_mhc = $rows_mhc[2];
                    $class_p_mhc = $rows_mhc[3];
                    $id_p_mhc = $rows_mhc[5];
                    ?>
                    <option value="<?php echo $id_p_mhc ?>"> <?php echo "[".$class_p_mhc."] ".$nome_p_mhc.", ".$cartao_saude_p_mhc.", ".$centro_saude_p_mhc;  ?> </option>
                <?php }
            }
            if($utilizador == 'MHD'){
                $result_mhd = mysqli_query($connect, $query_mhd);
                while($rows_mhd = mysqli_fetch_array($result_mhd)){
                    $nome_p_mhd = $rows_mhd[0];
                    $centro_saude_p_mhd = $rows_mhd[1];
                    $cartao_saude_p_mhd = $rows_mhd[2];
                    $class_p_mhd = $rows_mhd[3];
                    $id_p_mhd = $rows_mhd[4];
                    ?>
                    <option value="<?php echo $id_p_mhd ?>"> <?php echo "[".$class_p_mhd."] ".$nome_p_mhd.", ".$cartao_saude_p_mhd.", ".$centro_saude_p_mhd;  ?> </option>
                <?php }
            }?>
        </select>
        <p style=" font-size: large"> <input type="submit" id="submit_select" name="submit_select" value="Atender" class="w3-teal w3-button"></p>
    </form>
</div>
<?php
if(isset($_POST['submit_select'])){
    $id_atend_paciente = $_POST['id'];
    ?>
    <form method="POST" action="index.php?action=verifySeePatient">
        <p style=" font-size: large"> <b> Relatório de atendimento: </b> <input class="w3-input" type="text" name="relatorio"> </p>
        <input type="hidden" name="id_atend_paciente" value="<?php echo $id_atend_paciente ?>">
        <p style=" font-size: large"> <input type="submit" name="submit_rel" value="Terminar atendimento" class="w3-teal w3-button"></p>
    </form>
    <?php
}

?>

<div class="w3-padding w3-container w3-bottom">
    <table>
        <tr>
            </form>
            <td> <form action="index.php?action=listaEspera"> <input style=" font-size: large" class="w3-teal w3-button" type="submit" name="submit" value="Voltar"> </form> </td>
        </tr>
    </table>
</div>