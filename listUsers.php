<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $query = "SELECT u.Tipo, u.Nome FROM 'users' AS u";
    $result = mysqli_query($connect, $query);
?>

<table border="1">
    <TR>
        <TH> Tipo </TH>
        <TH> Nome </TH>
    </TR>
    <?php
        while($rows = mysqli_fetch_array($result)){
           ?>
    <TR>
        <TD> <?php echo $rows[0]; ?> </TD>
        <TD> <?php echo $rows[1]; ?> </TD>
    </TR>
    <?php } ?>
</table>
