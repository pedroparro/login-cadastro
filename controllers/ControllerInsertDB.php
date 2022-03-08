<?php
namespace Controllers;
include("../vendor/autoload.php");
use \Models\ClassDB;
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

class ControllerEmailToken 
{

    public function emailController()
    {
        
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'seu user name mailtrap';
        $this->mail->Password = 'sua senha mailtrap';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
        $this->mail->CharSet = 'UTF-8';
        //DE
        $this->mail->setFrom('pedro@gmail.com', 'Test');
        //PARA
        $this->mail->addAddress('pedro@gmail.com','Pedro');
        //CONTEUDO
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Contato do Site.';
    }
    
    public function insertController($token)
    {
         //tamanho do token
         $length = 8;
         //str_split separa string em array
         $a = str_split("ABCDEFGHIJKLMNOPQRSTUWYZ1234567890");
         //array vazio recebe o token
         $b = array();
         //for percorre array
         for($i = 0; $i < $length; $i++){
             //rand pega valor aleatorio
             $randon = rand(0, (sizeof($a)-1));
             $b[$i] = $a[$randon];
         }
         //retorna um string
         $token = join("",$b);
         //echo $token;*/

         //file GET
         $file = file_get_contents("../views/cadastro.html");
         $file = str_replace("[NOME]", $_POST['nome'], $file);
         $file = str_replace("[TOKEN]", $token, $file);

         //send - email
         $this->mail->Body = $file;
         $this->mail->send();
         

        //INSERT - isset extract
        extract($_POST);
        if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['roles'])){
            //variaveis post
            $id = null;
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $role = $_POST['roles'];
            
            //instancia a classe
            $obj = new ClassDB();
            $obj->insertDB(
                    "login_db",
                    "?,?,?,?,?,?,?",
                    array(
                        $id,
                        $nome,
                        $email,
                        $senha,
                        $role,
                        $token,
                        $status
                    )
            );
            //header("Location: ../index.php");
            die();
        }else{
            //header("Location: ../index.php");
            die();
        }
    }
}
//intancia
$mail = new ControllerEmailToken();
$mail->emailController();
$mail->insertController($token);
?>
