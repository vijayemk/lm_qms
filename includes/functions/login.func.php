<?php
function logout($username,$auth) {
 //if(isset($_SESSION['changeable'])
    unset($_SESSION['changeable']);
 //if(isset($_SESSION['changeable'])
    unset($_SESSION['browsing']);
}
?>