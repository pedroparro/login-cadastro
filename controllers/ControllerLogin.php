<?php
include("../vendor/autoload.php");
use \Models\ClassDB;

class ControllerLogin
{
    public function loginController()
    {
        //isset && extract
        extract($_POST);
        if(isset($_POST['email']) && isset($_POST['senha'])){
            //variaveis posts
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            //variaveis empty
            if(empty($_POST['email'])){
                header("Location: ../index.php?erro=Preencha todos os campos");
                die();
            }elseif(empty($_POST['senha'])){
                header("Location: ../index.php?erro=Preencha todos os campos");
                die();
            }
            //instancia
            $obj = new ClassDB();
            $sql=$obj->selectDB("*","login_db","where email=?",array("{$email}"));
            //busca no DB
            if($sql->rowCount() > 0){
                $row = $sql->fetch(\PDO::FETCH_ASSOC);
            
                //if email
                if($row['email'] === $_POST['email']){
                    //if pass
                    if(password_hash($_POST['senha'], PASSWORD_DEFAULT)){
                        //start session 
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['nome'] = $row['nome'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['senha'] = $row['senha'];
                        $_SESSION['roles'] = $row['roles'];
                        $_SESSION['statuss'] = $row['statuss'];
                       
                    }else{
                        header("Location: ../index.php");
                        die();
                    }
                   
                }else{
                    header("Location: ../index.php");
                    die();
                }

            }else{
                header("Location: ../index.php");
                die();
            }

        }else{
            header("Location: ../index.php");
            die();
        }
    }
    //roles
    public function roleController()
    {
        //session dashboard = 1
        if($_SESSION['roles'] === "1" && $_SESSION['statuss'] === "1"){   
            //dashboard
            header("Location: ../views/dashboard.php");
            die();
        //session visitante = 2
        }elseif($_SESSION['roles'] === "2" && $_SESSION['statuss'] === "1"){        
            //visitante
            header("Location: ../views/visitante.php");
            die();
        }else{
            header("Location: ../index.php");
            die();
        }
    }
   
}
//instancia
$obj = new ControllerLogin();
$obj->loginController();
$obj->roleController();
?>