<?php

if (isset($_SESSION['authuser']) && $_SESSION['authuser']==1) {
    echo "Login bem sucedido";
    include("homepage.php");
}
else{
    echo "Login incorreto";
    include ("showlogin.php");
}
?>