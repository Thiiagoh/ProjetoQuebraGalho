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
                        <h2 class="titletitle">Digite seu email</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <?php  
                            if(isset($_POST['esqueci'])){
                                include_once "conectar.php";
                                $email    = $_POST['email'];
                                $assunto  = 'Recuperacao de Senha';
                                // verifica se o e-mail está no cadastrado no sistem    
                                try{
                                    $tenta_achar = "SELECT * FROM usuario WHERE email='$email'";
                                    $sql = mysqli_query($conecta, "select * from usuario where email ='$email'");
                                    $resultadosss = $conecta->query($tenta_achar);
                                    if ($resultadosss->num_rows == 1){
                                        while($exibe = mysqli_fetch_assoc($sql)){
                                            $senhaUser = $exibe["senha"];
                                        }
                                            
                                        require_once('envia-email/PHPMailer/class.phpmailer.php');
                                        
                                        $Email = new PHPMailer();
                                        $Email->SetLanguage("br");
                                        $Email->IsSMTP(); // Habilita o SMTP 
                                        $Email->SMTPSecure = 'tls';
                                        $Email->SMTPAuth = true; //Ativa e-mail autenticado
                                        $Email->Host = 'smtp.gmail.com'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
                                        $Email->Port = '587'; // Porta de envio - verificar com o servidor
                                        $Email->Username = 'root.thuask@gmail.com'; //e-mail que será autenticado
                                        $Email->Password = 'Needforspeedcarbon2019'; // senha do email
                                        // ativa o envio de e-mails em HTML, se false, desativa.
                                        $Email->IsHTML(true); 
                                        // email do remetente da mensagem
                                        $Email->From = 'root.thuask@gmail.com';
                                        // nome do remetente do email
                                        $Email->FromName = utf8_decode($email);
                                        // Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
                                        $Email->AddReplyTo($email, 'Quebra-Galho');
                                        $Email->AddAddress($email); // para quem será enviada a mensagem
                                        // informando no email, o assunto da mensagem
                                        $Email->Subject = utf8_decode($assunto);
                                        // Define o texto da mensagem (aceita HTML)
                                        $Email->Body .= "Seguem os dados para acesso do Sistema:<br /><br />
                                                         <strong>Senha:</strong> $senhaUser<br /><br />
                                                         
                                                         <strong>Obs:</strong> Voc&ecirc; n&atilde;o precisa responder &agrave; este e-mail
                                                         
                                                        ";
                                        // verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
                                        if(!$Email->Send()){
                                            echo '<div class="alert alert-danger">
                                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                                  <strong>Erro ao enviar!</strong> Houve um problema ao recuperar sua senha.
                                            </div>';
                                            echo "Erro: " . $Email->ErrorInfo;
                                        }else{
                                            echo '<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                                  <strong>Sucesso!</strong> Uma mensagem com as informações de acesso foi enviada p/ o e-mail informado.
                                            </div>';
                                        }
                                    }else{
                                        echo '  <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>Erro!</strong> O e-mail digitado não consta no sistema.
                                                </div>';}
                                }catch(PDOException $e){
                                    echo $e;
                                }   
                            }// se clicar
                        ?> 
                        <input type="submit" name="esqueci" class="butn solid" />
                    </form>
                </div>
            </div>
            <div class="panels-cont">
                <div class="panel left-panel">
                    <div class="conte">
                        <h3>Já possui uma conta?</h3>
                        <p>Clique aqui para acessar o quebra-galho.</p>
                        <a href="index.php"><button class="butn transparent">Entrar</button></a>
                    </div>
                    <img src="images/register.svg" class="image" alt="" />
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