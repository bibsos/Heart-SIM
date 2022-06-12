<?php
    include('pacientes.php');
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $id_user = $_SESSION['ID'];
    $id_patient = $_SESSION['ID_pacientes'][0];
    if(isset($_POST['submit'])) {
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


        $query = "INSERT INTO `episodio_clinico`(`ID`, `ID_utilizador`, `ID_paciente`, `Classificacao`, `Data_consulta`, `Data_Atendimento`, `Relatorio`, `NYHA`, `Angor`, `Sincope`, `Dispneia`, `Pressao_arterial`, `Edema_periferico`, `Crepitacoes`, `Creatinina`, `Hemoglobina`, `Ejecao_VE`)
        VALUES (NULL,'$id_user','$id_patient','$classificacao',NULL,NULL,NULL,'$nyha','$angor','$sincope','$dispneia','$pa','$edema','$crepitacoes','$creatinina','$hemoglobina','$ejecao_ve')";
        $confirmation = "SELECT `Contacto` FROM utilizador where $contacto = `Contacto`";
        $confirm_query = mysqli_query($connect, $confirmation);
        if (mysqli_num_rows($confirm_query) == 0) {
            if (mysqli_query($connect, $query)) {

                echo("Utilizador adicionado com sucesso!");
            } else {
                echo "Erro a adicionar o utilizador:" . mysqli_error($connect);
            }
        }
        else {
            echo "Utilizador já existe!";
        }
    }