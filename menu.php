<?php
if (!isset($_SESSION['utilizador'])){
    ?>
    <div class="w3-top">
        <div class="w3-bar w3-teal w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-teal" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="index.php?action=homepage" class="w3-bar-item w3-button w3-padding-large w3-white">Início</a>
            <a href="index.php?action=showlogin" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"> Iniciar Sessão </a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="index.php?action=showlogin" class="w3-bar-item w3-button w3-padding-large"> Iniciar Sessão </a>
        </div>
    </div>
    <?php
} else{
    switch($_SESSION['utilizador']){
        case 'MF':
            ?>

            <!-- Navbar -->
            <div class="w3-top">
                <div class="w3-bar w3-teal w3-card w3-left-align w3-large">
                    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-teal" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <a href="index.php?action=homepage" class="w3-bar-item w3-button w3-padding-large w3-white">Início</a>
                    <a href="index.php?action=registoConsulta" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Registo de Consultas</a>
                    <a href="index.php?action=pacientes" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pacientes</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Log out</a>
                </div>


                <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
                    <a href="index.php?action=registoConsulta" class="w3-bar-item w3-button w3-padding-large">Registo de Consultas</a>
                    <a href="index.php?action=pacientes" class="w3-bar-item w3-button w3-padding-large">Pacientes</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-padding-large">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-padding-large">Log out</a>
                </div>
            </div>
            <?php
            break;
        case 'MHC':
            ?>
            <!-- Navbar -->
            <div class="w3-top">
                <div class="w3-bar w3-teal w3-card w3-left-align w3-large">
                    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-teal" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <a href="index.php?action=homepage" class="w3-bar-item w3-button w3-padding-large w3-white">Início</a>
                    <a href="index.php?action=listaEspera" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Lista de Espera</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Log out</a>
                </div>


                <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
                    <a href="index.php?action=listaEspera" class="w3-bar-item w3-button w3-padding-large">Lista de Espera</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-padding-large">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-padding-large">Log out</a>
                </div>
            </div>
            <?php
            break;
        case 'MHD':
            ?>
            <!-- Navbar -->
            <div class="w3-top">
                <div class="w3-bar w3-teal w3-card w3-left-align w3-large">
                    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-teal" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <a href="index.php?action=homepage" class="w3-bar-item w3-button w3-padding-large w3-white">Início</a>
                    <a href="index.php?action=listaEspera" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Lista de Espera</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Log out</a>
                </div>


                <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
                    <a href="index.php?action=listaEspera" class="w3-bar-item w3-button w3-padding-large">Lista de Espera</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-padding-large">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-padding-large">Log out</a>
                </div>
            </div>

            <?php
            break;
        case 'Adm':
            ?>

            <div class="w3-top">
                <div class="w3-bar w3-teal w3-card w3-left-align w3-large">
                    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-teal" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <a href="index.php?action=homepage" class="w3-bar-item w3-button w3-padding-large w3-white">Início</a>
                    <a href="index.php?action=listUsers" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Utilizadores</a>
                    <a href="index.php?action=statistic" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Estatística</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Log out</a>
                </div>

                <!-- Navbar on small screens -->
                <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
                    <a href="index.php?action=listUsers" class="w3-bar-item w3-button w3-padding-large">Utilizadores</a>
                    <a href="index.php?action=statistic" class="w3-bar-item w3-button w3-padding-large">Estatística</a>
                    <a href="index.php?action=perfil" class="w3-bar-item w3-button w3-padding-large">Perfil</a>
                    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-padding-large">Log out</a>
                </div>
            </div>

            <?php
            break;
    }
}