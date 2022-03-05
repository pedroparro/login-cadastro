<?php
include("../vendor/autoload.php");
use Models\ClassDB;

if(isset($_GET["token"])){
   
    try {
        $obj = new ClassDB();
        $obj->updateDB(
                    "login_db",
                    "statuss = '1'",
                    "tokenn = ?",
                    array(
                        $_GET['token']
                    )
        );
        echo "Sua conta foi confirmada";

    } catch (\PDOException $e) {
        echo "Erro";
        return $e->getMessage();
    }
}else{
    echo "Token não encontrado";
    die();
}
?>
