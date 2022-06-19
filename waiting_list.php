<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $utilizador = $_SESSION['utilizador'];
?>
    <div class="w3-teal w3-row-padding w3-padding-64 w3-container">
        <h3> Lista de Espera </h3>
    </div>
    <div class="w3-margin">
    <a>
        <a style=" font-size: large" class="w3-button w3-bar-item w3-light-grey" href="index.php?action=atenderPaciente"> Atender Paciente </a>
    </a>
    </div>
<div class="w3-padding w3-container">
<?php

    if($utilizador == 'MHC'){
        $query_1 = "SELECT p.Nome, p.Centro_saude, p.Cartao_saude, e.Classificacao, e.Data_consulta, p.ID FROM patient AS p
            INNER JOIN episodio_clinico AS e ON e.ID_paciente = p.ID
            WHERE e.Classificacao = '1' AND e.Relatorio IS NULL LIMIT 20 ";
        $result_1 = mysqli_query($connect, $query_1);
        $_POST['pacientes_1'] = $query_1;
    ?>

        <table class="w3-table w3-striped w3-bordered w3-hoverable w3-responsive w3-center w3-">
        <tr>
            <td> Nome </td>
            <td> Centro de Saúde </td>
            <td> Cartão de Saúde </td>
            <td> Data da Consulta </td>
            <td> Classificação </td>
        </tr>
        <?php
        while($row_1=mysqli_fetch_array($result_1)){
            $time_1 = date('z', strtotime($row_1[4]));
            $data_consulta_1 = date('d/m/y', strtotime($row_1[4]));
            $current_1 = getdate(time())['yday'];
            $diff_1 = $current_1 - $time_1;
        ?>
        <tr>
            <td> <?php echo $row_1[0]; ?> </td>
            <td> <?php echo $row_1[1]; ?> </td>
            <td> <?php echo $row_1[2]; ?> </td>
            <td> <?php echo $data_consulta_1."(".$diff_1." dias)"; ?> </td>
            <td> <?php echo $row_1[3]; ?> </td>
        </tr>
        <?php
        }
        ?>
        </table <?php
    }
    if($utilizador == 'MHD'){
        $query_2 = "SELECT p.Nome, p.Centro_saude, p.Cartao_saude, e.Classificacao, e.Data_consulta, p.ID FROM patient AS p
            INNER JOIN episodio_clinico AS e ON e.ID_paciente = p.ID
            WHERE e.Classificacao = '2' AND e.Relatorio IS NULL LIMIT 20";
        $result_2 = mysqli_query($connect, $query_2);
        $_POST['pacientes_2'] = $query_2;
        $query_3 = "SELECT p.Nome, p.Centro_saude, p.Cartao_saude, e.Classificacao, e.Data_consulta, p.ID FROM patient AS p
            INNER JOIN episodio_clinico AS e ON e.ID_paciente = p.ID
            WHERE e.Classificacao = '3' AND e.Relatorio IS NULL LIMIT 20";
        $result_3 = mysqli_query($connect, $query_3);
        $_POST['pacientes_3'] = $query_3;
        $query_4 = "SELECT p.Nome, p.Centro_saude, p.Cartao_saude, e.Classificacao, e.Data_consulta, p.ID FROM patient AS p
            INNER JOIN episodio_clinico AS e ON e.ID_paciente = p.ID
            WHERE e.Classificacao = '4' AND e.Relatorio IS NULL LIMIT 20";
        $result_4 = mysqli_query($connect, $query_4);
        $_POST['pacientes_4'] = $query_4;
    ?>
    <table class="w3-table w3-striped w3-bordered w3-hoverable w3-responsive w3-center w3-large">
        <tr>
            <td> Nome </td>
            <td> Centro de Saúde </td>
            <td> Cartão de Saúde </td>
            <td> Data da Consulta </td>
            <td> Classificação </td>
        </tr>
        <?php
        if(mysqli_num_rows($result_2) != 0){
            while($row_2=mysqli_fetch_array($result_2)){
                $time_2 = date('z', strtotime($row_2[4]));
                $data_consulta_2 = date('d/m/y', strtotime($row_2[4]));
                $current_2 = getdate(time())['yday'];
                $diff_2 = $current_2 - $time_2;
            ?>
            <tr>
                <td> <?php echo $row_2[0]; ?> </td>
                <td> <?php echo $row_2[1]; ?> </td>
                <td> <?php echo $row_2[2]; ?> </td>
                <td> <?php echo $data_consulta_2."(".$diff_2." dias)"; ?> </td>
                <td> <?php echo $row_2[3]; ?> </td>
            </tr>
            <?php
            }
            }
        if(mysqli_num_rows($result_3) != 0){
            while($row_3=mysqli_fetch_array($result_3)){
                $time_3 = date('z', strtotime($row_3[4]));
                $data_consulta_3 = date('d/m/y', strtotime($row_3[4]));
                $current_3 = getdate(time())['yday'];
                $diff_3 = $current_3 - $time_3;
            ?>
            <tr>
                <td> <?php echo $row_3[0]; ?> </td>
                <td> <?php echo $row_3[1]; ?> </td>
                <td> <?php echo $row_3[2]; ?> </td>
                <td> <?php echo $data_consulta_3."(".$diff_3." dias)"; ?> </td>
                <td> <?php echo $row_3[3]; ?> </td>
            </tr>
            <?php
            }
            }
            if(mysqli_num_rows($result_4) != 0){
            while($row_4=mysqli_fetch_array($result_4)){
                $time_4 = date('z', strtotime($row_4[4]));
                $data_consulta_4 = date('d/m/y', strtotime($row_4[4]));
                $current_4 = getdate(time())['yday'];
                $diff_4 = $current_4 - $time_4;
            ?>
            <tr>
                <td> <?php echo $row_4[0]; ?> </td>
                <td> <?php echo $row_4[1]; ?> </td>
                <td> <?php echo $row_4[2]; ?> </td>
                <td> <?php echo $data_consulta_4."(".$diff_4." dias)"; ?> </td>
                <td> <?php echo $row_4[3]; ?> </td>
            </tr>
            <?php
            }
            }
            ?> </table>
        <?php
            }
        ?>
    </table>
    </div>
