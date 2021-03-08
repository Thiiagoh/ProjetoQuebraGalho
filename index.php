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
        <link rel="stylesheet" type="text/css" href="css/main2.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    </head>
    <body>
        <div class="root">
            <div class="top-bar">
                <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(21,18,45,.59);">
                    <div class="container">
                        <a class="navbar-brand" href="#" style="font-family: 'Ubuntu-Bold';background-color: rgb(255 255 255 / 7%);border-radius: 5px;padding-inline: 10px;">Quebra-galho</a>
                    </div>
                </nav>
            </div>

            <div id="main" class="main main-acesso d-flex flex-column">
                <div class="margin-top"></div>
                <div class="main-container">
                    <div class="row list mb-5">
                        <div class="limiter">
                            <div class="container-modificado">
                                <div class="wrap-login100 p-t-50 p-b-90" style="width: 390px;">

                                    <form class="login100-form validate-form flex-sb flex-w" action="fazerLigacao.php" method="POST">
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
                                            <a class="textcads" href="cadastro2.php">
                                                Crie sua conta
                                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="container-login100-form-btn m-t-17">
                                            <button class="login100-form-btn">
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
            </div>
        </div>
        
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