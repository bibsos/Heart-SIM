<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    include("index.php");
    $id = $_SESSION['ID'];
    if(isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $data = $_POST['data_nascimento'];
        $sexo = $_POST['Sexo'];
        $morada = $_POST['morada'];
        $contacto = $_POST['contacto'];
        $localidade = $_POST['localidade'];
        $distrito = $_POST['distrito'];
        $fotografia = $_POST['foto'];
        $email = $_POST['email'];
        $cartao_saude = $_POST['cartao_saude'];
        $alergias = $_POST['alergias'];
        $nif = $_POST['nif'];

    $query = "INSERT INTO `paciente`(`ID`, `Nome`, `Morada`, `Localidade`, `Distrito`, `Contacto`, `Email`, `Cartao_saude`, `Fotografia`, `Lista Alergias`, `Data Nascimento`, `Sexo`, `NIF`)
        VALUES (NULL,'$nome','$morada','$localidade','$distrito','$contacto','$email','$cartao_saude','$fotografia','$alergias','$data','$sexo','$nif')";
    $confirmation = "SELECT `paciente` FROM paciente where $contacto = `Contacto` && $cartao_saude = `Cartao_saude`";
    $confirm_query = mysqli_query($connect, $confirmation);
    if (mysqli_num_rows($confirm_query) == 0) {
        if (mysqli_query($connect, $query)) {
            $find_id = "SELECT `ID` FROM paciente where $contacto = `Contacto` && $cartao_saude = `Cartao_saude`";
            $result_id = mysqli_query($connect, $find_id);
            $doctor_pacient_connect = "INSERT INTO `episodio_clinico`(`ID`, `ID_utilizador`, `ID_paciente`, `Classificacao`, `Data_consulta`, `Data_Atendimento`, `Relatorio`, `NYHA`, `Angor`, `Sincope`, `Dispneia`, `Pressao_arterial`, `Edema_periferico`, `Crepitacoes`, `Creatinina`, `Hemoglobina`, `Ejecao_VE`) 
            VALUES (NULL,$id,$result_id,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
            if( mysqli_query($connect, $doctor_pacient_connect)){
                echo("Paciente adicionado com sucesso!");
            }
        }
        else {
            echo "Erro a adicionar o paciente:" . mysqli_error($connect);
        }
    }
    else {
        echo "Este paciente já existe!";
    }
}
?>

