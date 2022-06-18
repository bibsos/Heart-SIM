<?php
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
            $password = hash("sha256",$_POST['pass']);
            $connect = mysqli_connect('localhost', 'root', '','heartsim')
            or die('Error connecting to the server: ' . mysqli_error($connect));
            $sql = "SELECT * FROM `users` AS u WHERE u.username = '$user' AND u.password = '$password'";
            $result = mysqli_query($connect, $sql) or die('The query failed: '.mysqli_error($connect));
            $row = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['authuser'] = 1;
                $islogin = true;
                $_SESSION['username'] = $_POST['user'];
                $_SESSION['utilizador'] = $row['Tipo'];
                $_SESSION['ID'] = $row["ID"];
                $_SESSION['instituicao'] = $row["Instituicao"];
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
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="author" content="Beatriz Silva, Ines Goncalves, Rita Lobo">
    <meta name="keywords" content="HeartSIM, Insuficiencia, cardiaca, SIM ">

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
        case "registoConsulta":
            $links = "Patients_without_event.php";
            break;
        case "pacientes":
            $links = "Patients_with_event.php";
            break;
        case "perfil":
            $links = "profile.php";
            break;
        case "novoPaciente":
            $links = "addPatient.php";
            break;
        case "novaConsulta":
            $links = "addEvent.php";
            break;
        case "adicionarUtilizador":
            $links = "addUser.php";
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
        case "verifylogin":
            $links = "verifylogin.php";
            break;
        case "showlogin":
            $links = "showlogin.php";
            break;
        case "verifyAddPatient":
            $links="verifyAddPatient.php";
            break;
        case "statistic":
            $links = "statistic.php";
            break;
        case "apagarUtilizador":
            $links = "deleteUser.php";
            break;
        case "verify_ApagarUtilizador":
            $links = "verifyDeleteUser.php";
            break;
        case "seeProfile":
            $links = "seeProfile.php";
            break;
        case "verifyUpdateProfile":
            $links = "verifyUpdateProfile.php";
            break;
        default:
            $links="homepage.php";
            break;
    }
    include ($links);
    ?>

</div>
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