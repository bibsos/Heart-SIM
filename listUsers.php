<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));

?>

<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1>  Utilizadores </h1>
</div>

<div class="w3-margin">
    <a>
        <a style=" font-size: large" class="w3-button w3-bar-item w3-light-grey" href="index.php?action=adicionarUtilizador"> Adicionar Utilizador </a>
        <a style=" font-size: large" class="w3-button w3-bar-item w3-light-grey" href="index.php?action=apagarUtilizador"> Apagar Utilizador </a>
    </a>

    <form method="POST" action="index.php?action=seeProfile">
        <h3 class="w3-light-gray"> Ver perfil: </h3>
        <table class="w3-table">
            <tr>
                <td> Username: <input class="w3-input" type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <td style=" font-size: large"> <input type="submit" id="submit_profile" name="submit_profile" value="Procurar" class="w3-teal w3-button"></td>
            </tr>
        </table>
    </form>
</div>
<div class="w3-margin">
    <form method="POST" >
        <h3 class="w3-light-gray"> Procurar por: </h3>
        <table class="w3-table">
            <tr>
                <td> Primeiro Nome: <input class="w3-input" type="text" id="firstname" name="firstname"> </td>
                <td> Apelido: <input class="w3-input" type="text" id="surname" name="surname"></td>
                <td> Username: <input class="w3-input" type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <td style=" font-size: large"> <input type="submit" id="submit_search" name="submit_search" value="Procurar" class="w3-teal w3-button"></td>
            </tr>
        </table>
    </form>

    <class="w3-padding w3-container">
    <?php if(isset($_POST['submit_search'])){
        $firstname = "";
        $surname="";
        $username="";
            if(!empty($_POST['firstname'])) {
                $firstname = $_POST['firstname'] . "%";
            }
            if(!empty($_POST['surname'])){
                $surname = "%".$_POST['surname']."%";
            }
            if(!empty($_POST['username'])) {
                $username = $_POST['username'];
            }

            $query_search = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '$firstname' OR u.Nome LIKE '$surname' OR u.username = '$username'";
            $result_search = mysqli_query($connect, $query_search);


            if(mysqli_num_rows($result_search) != 0){
            ?>
                <table class="w3-table w3-striped w3-bordered w3-hoverable w3-responsive w3-center w3-large">
                    <TR>
                        <TH> Tipo </TH>
                        <TH> Nome </TH>
                        <TH> Instituição </TH>
                    </TR>
                    <?php
                    while($rows_search = mysqli_fetch_array($result_search)){
                    ?>
                    <TR>
                        <TD> <?php echo $rows_search[0]; ?> </TD>
                        <TD> <?php echo $rows_search[1]; ?> </TD>
                        <TD> <?php echo $rows_search[2]; ?> </TD>
                    </TR>
                <?php
                    } ?>
                </table>
            <?php
            }
            else{
                die("Esse utilizador não existe!");
            }
        }

    else{
    ?>
        <table class="w3-table w3-striped w3-bordered w3-hoverable w3-responsive w3-center w3-large">
            <TR class="w3-light-grey">
                <TH> Tipo </TH>
                <TH> Nome </TH>
                <TH> Instituição </TH>
            </TR>
            <?php
            $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM users AS u";
            $result = mysqli_query($connect, $query);
            while($rows = mysqli_fetch_array($result)){
            ?>
                <TR>
                    <TD> <?php echo $rows['Tipo']; ?> </TD>
                    <TD> <?php echo $rows['Nome']; ?> </TD>
                    <TD> <?php echo $rows['Instituicao']; ?> </TD>
                </TR>
            <?php
            } ?>
        </table>
    <?php
    } ?>
</div>    






