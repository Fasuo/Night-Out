<?php
session_start();
require('components/header.php');
if (isset($_SESSION['username'])){
    require ('components/user.php');
    if ($_SESSION["isadmin"]==1){
        require ('components/admin.php');
    }
} else{
   require ('components/login.php');
}

require ('components/footer.php');
?>
