<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM `patient` AS p WHERE p.ID = $id";
        $result = mysqli_query($connect, $query);
    }
    include("index.php");
?>





