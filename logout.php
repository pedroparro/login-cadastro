<?php
//destroy session
if (!isset($_SESSION['login'])) {
    session_start();
    ob_start();
    session_destroy();

    header("Location: ./index.php");
    die();
}
?>