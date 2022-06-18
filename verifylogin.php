<?php

if (isset($_SESSION['authuser']) && $_SESSION['authuser']==1) {
    include("homepage.php");
}
else{
    include ("showlogin.php");
}
?>