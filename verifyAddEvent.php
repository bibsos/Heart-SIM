<?php
    include('index.php');
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    if(isset($_POST['submit'])) {
        $id_paciente = $_POST['paciente'];
        echo $id_paciente;
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
        $id = $_SESSION['ID'];



        $query = "INSERT INTO `episodio_clinico`(`ID`, `ID_utilizador`, `ID_paciente`, `Classificacao`, `Data_consulta`, `Data_Atendimento`, `Relatorio`, `NYHA`, `Angor`, `Sincope`, `Dispneia`, `Pressao_arterial`, `Edema_periferico`, `Crepitacoes`, `Creatinina`, `Hemoglobina`, `Ejecao_VE`)
            VALUES (NULL,'$id','$id_paciente',NULL,NULL,NULL,NULL,'$nyha','$angor','$sincope','$dispneia','$pa','$edema','$crepitacoes','$creatinina','$hemoglobina','$ejecao_ve')";
        if (mysqli_query($connect, $query)) {
                echo("Consulta adicionada!");
            }
        else {
            echo "Erro a adicionar consulta:" . mysqli_error($connect);
        }
    }