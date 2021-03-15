<!DOCTYPE html>
<html>
    <head>
        <title>Página - Login</title>
	    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <?php 
            session_start();
            if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                session_unset();
            }else{
                echo "<script>window.location.href = 'anuncios.php';</script>";
            }
        ?>
    </head>
    <body>
        <div class="top-bar">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(21,18,45,.59);">
                <div class="container">
                    <a class="navbar-brand" href="#" style="font-family: 'Ubuntu-Bold';background-color: rgb(255 255 255 / 7%);border-radius: 5px;padding-inline: 10px;">Quebra-galho</a>
                </div>
            </nav>
        </div>

        <div class="cont">
            <div class="forms-cont">
                <div class="signin-signup">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="sign-in-form">
                        <h2 class="titletitle">Entrar no Quebra-Galho</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="senha" placeholder="Senha" required>
                        </div>
                        <?php
                            if (isset($_POST['loginlogin'])){
                                include_once "conectar.php";
                                $email = $_POST['email'];
                                $senha = $_POST['senha'];
                                if($conecta->connect_error === TRUE){    
                                    die("Deu erro na conexão ". $conecta->connect_error);
                                }
                                $tenta_achar = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
                                $resultado = $conecta->query($tenta_achar);
                                if ($resultado->num_rows > 0){
                                    $_SESSION['email'] = $email;
                                    $_SESSION['senha'] = $senha;
                                    header('location:anuncios.php');
                                }
                                else{
                                    session_unset();
                                    session_destroy();
                                    unset($_POST['loginlogin']);
                                    echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                    <div class="alert alert-warning fade show" role="alert">
                                                        <strong>Erro!</strong> Verifique os dados informados!
                                                    </div>
                                                </div><br>';
                                }
                            }
                        ?>
                        <input type="submit" value="Continuar" name="loginlogin" class="butn solid" />
                        <p class="social-text">Esqueceu a senha? <a href="recuperacao.php" class="aa">Clique aqui!</a></p>
                        <!-- <div class="social-media">
                          <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                          </a>
                          <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                          </a>
                          <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                          </a>
                          <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                          </a>
                        </div> -->
                    </form>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="sign-up-form">
                        <h2 class="titletitle">Cadastrar</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="name" name="nome" placeholder="Nome" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="senha" placeholder="Senha" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="senha2" placeholder="Confimar Senha" />
                        </div>
                        <?php
                        if (isset($_POST['cadastroenviado'])){
                            //Receber as informações via formulario
                            include_once "conectar.php";
                            $nome = $_POST['nome'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            $senha2 = $_POST['senha2'];
                            //Inserir registro
                            if ($senha == $senha2){
                                if (empty($email) || empty($senha) || empty($senha2)){
                                    echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                    <div class="alert alert-warning fade show" role="alert">
                                                        <strong>Erro!</strong> Algum campo esta vazio, escreva algo!
                                                    </div>
                                                </div><br>';
                                }else{
                                    $sql = "INSERT INTO usuario(email,senha,escolha,cpf,membro,nome,avatar,sexo, escolaridade, estado) VALUES('$email','$senha','0',NULL, '0', '$nome', 'user.png', 'Selecione', 'Selecione', 'Selecione')";
                                    if ($conecta->query($sql) === TRUE) {
                                        echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                    <div class="alert alert-success fade show" role="alert">
                                                        <strong>Sucesso!</strong> Usuário registrado com sucesso!
                                                    </div>
                                                </div><br>';
                                    } else{
                                        echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                    <div class="alert alert-warning fade show" role="alert">
                                                        <strong>Erro!</strong> O usuário informado já existe!
                                                    </div>
                                                </div><br>';
                                    }
                                }
                            }else{
                                echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                            <div class="alert alert-danger fade show" role="alert">
                                                <strong>Erro!</strong> As senhas não correspondem!
                                            </div>
                                        </div><br>';
                            }
                            $conecta->close();
                        }
                    ?>
                        <input type="submit" name="cadastroenviado" class="butn" value="Criar" />
                    </form>
                </div>
            </div>
            <div class="panels-cont">
                <div class="panel left-panel">
                    <div class="conte">
                        <h3>Novo aqui ?</h3>
                        <p>Crie uma conta rápido e fácil!</p>
                        <button class="butn transparent" id="sign-up-btn">criar</button>
                    </div>
                    <img src="images/log.svg" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="conte">
                        <h3>Já possui uma conta?</h3>
                        <p>Clique aqui para acessar o quebra-galho.</p>
                        <button class="butn transparent" id="sign-in-btn">Entrar</button>
                    </div>
                    <img src="images/register.svg" class="image" alt="" />
                </div>
            </div>
        </div>
            <!-- <div id="main" class="main main-acesso d-flex flex-column">
                <div class="margin-top"></div>
                <div class="main-container">
                    <?php
                        if (isset($_POST['loginlogin'])){
                            include_once "conectar.php";
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            if($conecta->connect_error === TRUE){    
                                die("Deu erro na conexão ". $conecta->connect_error);
                            }
                            $tenta_achar = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
                            $resultado = $conecta->query($tenta_achar);
                            if ($resultado->num_rows > 0){
                                $_SESSION['email'] = $email;
                                $_SESSION['senha'] = $senha;
                                header('location:anuncios.php');
                            }
                            else{
                                session_unset();
                                session_destroy();
                                echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                    <div class="alert alert-warning fade show" role="alert">
                                                        <strong>Erro!</strong> Verifique os dados informados!
                                                    </div>
                                                </div><br>';
                            }
                        }
                    ?>
                    <div class="row list mb-5">
                        <div class="limiter">
                            <div class="container-modificado">
                                <div class="wrap-login100 p-t-50 p-b-90" style="width: 390px;">

                                    <form class="login100-form validate-form flex-sb flex-w" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <span class="login100-form-title m-b-20">Acessar Login</span>

                                        <div class="wrap-input100 validate-input m-b-16" data-validate = "Email válido: ex@abc.com">
                                            <input class="input100" type="email" name="email" placeholder="Digite seu email">
                                            <span class="focus-input100"></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope" style="color: #345f6f;" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="wrap-input100 validate-input m-b-16" data-validate = "Senha é necessária">
                                            <input class="input100" type="password" name="senha" placeholder="Digite sua senha" maxlength="45">
                                            <span class="focus-input100"></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-lock" style="color: #345f6f;" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="textcadastrar">
                                            <a class="textcads" href="cadastro.php">
                                                Crie sua conta</a> /<a class="textcads" href="lembrar.php"> Lembrar a senha
                                            </a>
                                        </div>
                                        <div class="container-login100-form-btn m-t-17">
                                            <button class="login100-form-btn" type="submit" name="loginlogin">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                Entrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	    <script src="vendor/bootstrap/js/popper.js"></script>
	    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	    <script src="vendor/select2/select2.min.js"></script>
	    <script src="vendor/tilt/tilt.jquery.min.js"></script>
	    <script>
            $('.js-tilt').tilt({
        	scale: 1.1
            });
	    </script>
	    <script src="js/main.js"></script>
    </body>
</html>