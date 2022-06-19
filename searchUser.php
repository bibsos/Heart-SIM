<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$query="";
if(isset($_POST['submit_search'])){
    if(isset($_POST['firstname'])){
        $firstname = $_POST['firstname'];
        if(isset($_POST['surname'])){
            $surname = $_POST['surname'];
            if(isset($_POST['username'])) {
                $username = $_POST['username'];
                $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '$firstname%$surname%' AND u.username = '$username'";
            }
            $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '$firstname%$surname%'";
        }
        $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome = '$firstname'";
    }
    else{
        if(isset($_POST['surname'])){
            $surname = $_POST['surname'];
            if(isset($_POST['username'])) {
                $username = $_POST['username'];
                $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '%$surname%' AND u.username = '$username'";
            }
            $query = "SELECT u.Tipo, u.Nome, u.Instituicao FROM `users` AS u WHERE u.Nome LIKE '%$surname%'";
        }
        else{
            if(isset($_POST['username'])){
                $username = $_POST['username'];
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
                    <TD> <?php echo $rows[0]; ?> </TD>
                    <TD> <?php echo $rows[1]; ?> </TD>
                    <TD> <?php echo $rows[2]; ?> </TD>
                </TR>
            <?php } ?>
        </table>
        <?php
    }
    else{
        die("Esse utilizador não existe!");
    }

}
