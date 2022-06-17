<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $query="";
    if(isset($_GET['firstname'])){
        $firstname = $_GET['firstname'];
        if(isset($_GET['surname'])){
            $surname = $_GET['surname'];
            if(isset($_GET['username'])) {
                $username = $_GET['username'];
                $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '$firstname%$surname%' AND u.username = '$username'";
            }
            $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '$firstname%$surname%'";
        }
        $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome = '$firstname'";
    }
    else{
        if(isset($_GET['surname'])){
            $surname = $_GET['surname'];
            if(isset($_GET['username'])) {
                $username = $_GET['username'];
                $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '%$surname%' AND u.username = '$username'";
            }
            $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '%$surname%'";
        }
        else{
            if(isset($_GET['username'])){
                $username = $_GET['username'];
                $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.username LIKE '$username'";
            }
        }
    }
    $result = mysqli_query($connect, $query);
    echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) != 0){
    ?>
        <table border="1">
            <TR>
                <TH> Tipo </TH>
                <TH> Nome </TH>
                <TH> Instituição </TH>
            </TR>
            <?php
                while($rows = mysqli_fetch_array($result)){
                ?>
            <TR>
                <TD> <?php echo $rows['Tipo']; ?> </TD>
                <TD> <?php echo $rows['Nome']; ?> </TD>
                <TD> <?php echo $rows['Instituicao']; ?> </TD>
            </TR>
            <?php } ?>
        </table>
    <?php
    }
    else{
        die("Esse utilizador não existe!");
    }