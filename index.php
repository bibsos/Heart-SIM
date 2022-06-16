<?php
//novo
    session_start();
    if(isset($_GET["action"])){
        $islogin = false;
        $action = $_GET["action"];
        switch($action) {
            case "showlogin":
                session_unset();
                break;
            case "verifylogin":
                $user = $_POST['user'];
                $password = $_POST['pass'];
                //$password = hash("sha256", $_POST['pass']); //Forma de encriptar antes de enviar. Se não só encriptaria depois de chegar à base de dados desencriptado
                $connect = mysqli_connect('localhost', 'root', '','heartsim')
                    or die('Error connecting to the server: ' . mysqli_error($connect));
                $sql = "SELECT * FROM `users` WHERE USERNAME = '$user' && PASSWORD = '$password'";
                $result = mysqli_query($connect, $sql)
                    or die('The query failed: '.mysqli_error($connect));
                $number = mysqli_num_rows($result); //if returns 1, then is a valid user
                if($number == 1){
                       $row = mysqli_fetch_assoc($result);
                       $_SESSION['authuser'] = 1;
                       $islogin = true;
                       $_SESSION['username'] = $_POST['user'];
                       $_SESSION['utilizador'] = $row['Tipo'];
                       $_SESSION['ID'] = $row["ID"];

                    //$_SESSION['centro'] = $row["Centro_saude"];
                }
                   else {
                       $_SESSION['authuser'] = 0;
                   }
                break;
            case "logout":
                session_unset();
                header("Location: index.php");
                exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> HeartSIM </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
        .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
        .fa-anchor,.fa-coffee {font-size:200px}
    </style>
</head>
<body>
    <!--<div class="logo">
        <img src="SIMlogo2.jpg" width="213" height="83" alt="HeartSIM" title="" style="float:left">
    </div>  -->
    <div class="navigation">
        <?php
            include("menu.php");
        ?>
    </div>
    <div class="contents">
        <?php
            if(isset($_GET["action"])){
                $action = $_GET["action"];
            }
            else {
                $action = "homepage";
            }
            $links = "";
            switch($action){
                case "homepage":
                    $links = "homepage.php";
                    break;
                case "registoConsulta":
                    $links = "Patients_without_event.php";
                    break;
                case "pacientes":
                    $links = "patients.php";
                    break;
                case "perfil":
                    $links = "profile.php";
                    break;
                case "novoPaciente":
                    $links = "newPatient.php";
                    break;
                case "novaConsulta":
                    $links = "newEvent.php";
                    break;
                case "adicionarutilizador":
                    $links = "adicionarUtilizador.php";
                    break;
                case "updateProfile":
                    $links = "updateProfile.php";
                    break;
                case "apagarPaciente":
                    $links = "deletePatient.php";
                    break;
                case "listUsers":
                    $links = "listUsers.php";
                    break;
            }
            include ($links);
            ?>

    </div>
    <!-- Footer -->
    <!--<div class="footer" style="background-color:#234567;color: white">
        <h3 align="center"> © HeartSIM - 2021-2022 </h3>
    </div>-->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity">
        <div class="w3-xlarge w3-padding-32">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
        <p>© HeartSIM - 2021-2022</p>
    </footer>
    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>