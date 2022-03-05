<?php
 if (!isset($_SESSION)) {
    session_start();
    ob_start();
}
    if (!isset($_SESSION['login'])){
        header('Location: ../index.php');
        session_destroy();
        die();
    }elseif($_SESSION['roles'] != "2"){
        header('Location: ../index.php');
        session_destroy();
        die();
    }elseif($_SESSION['statuss'] != "1"){
        header('Location: ../index.php');
        session_destroy();
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISITANTE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../public/css/style.css"/>
</head>
<body>
    <h2>VISITANTE</h2><?php echo $_SESSION['nome']; ?>

    <a class="btn btn-primary" href="../logout.php">Sair</a>

    <!--footer-->
    <footer>
        Desenvolvido por<span> Pedro Parro</span>
    </footer>
</body>
</html>
<?php
