<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> HeartSIM </title>
<meta charset="UTF-8">
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

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-teal w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-teal" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-teal w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Bem vindo!</h1>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Iniciar sessão </button>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-half">
      <h1>HeartSIM</h1>
      <h5 class="w3-padding-32">O que é a plataforma HeartSim? </h5>

      <p class="w3-text-grey"> Esta plataforma foi criada com o objetivo de  auxiliar os prestadores de cuidados de
          saúde na gestão das filas de espera nos Hospitais de Dia e nos serviços de urgência dos hospitais centrais
          relativamente a pacientes com Insuficiência Cardíaca (IC).
          Assim, HeartSIM irá permitir organizar o atendimento de doentes entre os Médicos de Família e os Médicos de
          Dia ou de um Hospital Central.
     </p>
    </div>

    <div class="w3-third w3-center">
        <img src="SIMlogo2.jpg" width="426" height="166" alt="HeartSIM" title="" style="float:none">
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="">
      <h5 class="w3-padding-32">Porquê HeartSIM?</h5>

      <p class="w3-text-grey">  A insuficiência cardíaca é uma doença crónica que afeta uma grande percentagem de adultos e idosos em Portugal.
      Muitas vezes, a procura imediata de auxílio nos serviços de urgências por parte destes pacientes provoca congestionamentos nos mesmos.
      É por isso importante coordenar os serviços relativos aos Centros de Saúde e Hospitais de Dia ou Centrais, de forma a melhor gerir o atendimento
      destes doentes.
      </p>
    </div>
  </div>
</div>

<!-- Footer -->
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

</body>
</html>

