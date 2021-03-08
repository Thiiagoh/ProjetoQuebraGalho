<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar um novo usuário!</title>
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
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-t-50 p-b-90">
                    <span class="login100-form-title p-b-51">Mensagem do sistema</span>
                       
                     <?php
                        //Receber as informações via formulario
                        include_once "conectar.php";
                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $cpf = $_POST['cpf'];
                        $senha = $_POST['senha'];
                        $senha2 = $_POST['senha2'];

                        //Conectar no mysql
                        $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco); 

                        //Inserir registro
                        if ($senha == $senha2){
                            if (empty($email) || empty($senha) || empty($senha2)){
                                echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                <div class="alert alert-warning fade show" role="alert">
                                                    <strong>Erro!</strong> Algum campo esta vazio, escreva algo!
                                                </div>
                                            </div><br>';
                                 echo ' 
                                        <script>setTimeout(function() {
                                            window.location.href = "cadastro2.php";
                                        }, 2000);
                                        </script>';
                            }else{
                                $sql = "INSERT INTO usuario(nome,email,senha,escolha,cpf) VALUES('$nome','$email','$senha','0','$cpf')";
                                if ($conecta->query($sql) === TRUE) {
                                    echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                <div class="alert alert-success fade show" role="alert">
                                                    <strong>Sucesso!</strong> Usuário registrado com sucesso!
                                                </div>
                                            </div><br>';
                                    echo ' 
                                        <script>setTimeout(function() {
                                            window.location.href = "index.php";
                                        }, 2000);
                                        </script>';
                                } else{
                                    echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                <div class="alert alert-warning fade show" role="alert">
                                                    <strong>Erro!</strong> O usuário informado já existe!
                                                </div>
                                            </div><br>';
                                     echo ' 
                                        <script>setTimeout(function() {
                                            window.location.href = "cadastro2.php";
                                        }, 2000);
                                        </script>';
                                }
                            }
                        }else{
                            echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                        <div class="alert alert-danger fade show" role="alert">
                                            <strong>Erro!</strong> As senhas não correspondem!
                                        </div>
                                    </div><br>';
                             echo ' 
                                        <script>setTimeout(function() {
                                            window.location.href = "cadastro2.php";
                                        }, 2000);
                                        </script>';
                        }
                        $conecta->close();
                    ?> 
        	   </div>
            </div>
    	</div>
        
        <div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
    </body>
</html>