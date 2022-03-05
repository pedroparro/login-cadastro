<?php
//inica sessao
if (!isset($_SESSION)) {
    session_start();
    ob_start();
}
    //redireciona
    if (isset($_SESSION['login'])) {
        header('Location: ./views/dashboard.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELA DE LOGIN CSS - JAVASCRIPT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="./public/css/style.css"/>
</head>
<body>
    <!--header-->
    <header id="subheader">Sistema de Cadastro<span> Pedro Parro</span></header>
    <!--msg-->
    <div class="mensagem" id="mensagem"></div>
    <!--main-->
    <main>
        <!--form acesse sua conta-->
        <div id="formulario"> 
            <form action="./controllers/ControllerLogin.php" method="POST" id="formularioLogin">
                <!--alert-->
                <?php if(isset($_GET['erro'])){ ?>
                    <div class="alert alert-danger" role="alert" id="alert">
                <?php echo $_GET['erro'];?>
                    </div>
                <?php } ?>
                    <span class="title">Acesse sua conta</span>
                <!--E-MAIL-->
                <div id="linha">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" maxlength="30">
                </div>
                <!--SENHA-->
                <div id="linha">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" maxlength="15">
                </div>
                <!--BUTTON ENTRAR-->
                <div id="button">
                    <button type="submit" name="submit" id="submit">Entrar</button>
                    <a href="javascript:void(0)" id="esqueciSenha">Esqueci minha senha</a>
                </div>
            </form>

             <!--form esqueci senha-->
            <form method="POST" id="formularioEsqueciSenha">
                    <span class="title">Esqueceu a senha</span>
                <!--E-MAIL-->
                <div id="linha">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" maxlength="30">
                </div>
             
                <!--BUTTON ENTRAR-->
                <div id="button">
                    <button type="button" name="btnEnviar" id="btnEnviar">Enviar</button>
                </div>
            </form>

            <!--form crie sua conta-->
            <form method="POST" id="formularioCadastro">
                        <span class="title">Crie sua conta</span>
                        <input type="hidden" name="id">
                    <!--LINHA - NOME-->
                    <div id="linha">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    <!--LINHA - E-MAIL-->
                    <div id="linha">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <!--LINHA - SENHA-->
                    <div id="linha">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha">
                    </div>
                     <!--LINHA - SELECT-->
                     <div id="linha">
                        <label for="roles">Selecione</label>
                        <select name="roles" id="roles">
                            <option>Selecione</option>
                            <option value="1">ADM</option>
                            <option value="2">VISITANTE</option>
                        </select>
                    </div>
                     <!--LINHA - CONFIRMADO-->
                     <div id="linha">
                        <!--input type="hidden" name="confirmado" id="confirmado"-->
                        <!--input type="hidden" name="tokenn" id="tokenn"-->
                    </div>
                    <!--BUTTON CADASTRO-->
                    <div id="button">
                        <button type="button" name="btnCadastrar" id="btnCadastrar">Cadastrar</button>
                    </div>
            </form>

            <!--BUTTON CADASTRAR-->
            <div id="textoCadastro">
                <span class="title">Não possui uma conta ?</span>
                <span class="subtitle">Crie uma conta agora !</span>
                <button id="btnCadastro" class="change">Cadastrar</button>
            </div>

            <!--BUTTON LOGIN-->
            <div id="textoLogin">
                <span class="title">Já possui uma conta ?</span>
                <span class="subtitle">Entre agora !</span>
                <button id="btnLogin" class="change">Entrar</button>
            </div>
          
    </main>
  
    <!--footer-->
    <footer>
        Desenvolvido por<span> Pedro Parro</span>
    </footer>

    <!--script-->
    <script src="./public/js/jquery.js"></script>    
    <script src="./public/js/script.js"></script>    
        
</body>
</html>