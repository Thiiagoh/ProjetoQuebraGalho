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
        <?php 
            session_start();
            if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                session_unset();
                echo "<script>window.location.href = 'index.php';</script>";
            }
            $logado = $_SESSION['email'];
            include_once "conectar.php";
            $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco);
            $sql = mysqli_query($conecta, "select * from usuario where email ='$logado'");
            while($exibe = mysqli_fetch_assoc($sql)){
                $id = $exibe["idUser"];
                $choose = $exibe["escolha"];
                if ($choose == "0"){
                    echo "<script>window.location.href = 'escolha.php';</script>";
                }
            }
        ?>
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
                        $id = $_POST['id'];
                        $sobrenome = $_POST['sobrenome'];
                        $sexo = $_POST['sexo'];
                        $email = $_POST['email'];
                        $grau = $_POST['grau'];
                        $endereco = $_POST['endereco'];
                        $complemento = $_POST['complemento'];
                        $cidade = $_POST['cidade'];
                        $estado = $_POST['estado'];
                        $cep = $_POST['cep'];
                        $descricao = $_POST['descricao'];

                        //Conectar no mysql
                        $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco); 


                        $tenta_achar = "SELECT * FROM postagem WHERE idUser='$id'";
                        $resultado = $conecta->query($tenta_achar);
                        if ($resultado->num_rows <= 0){
                            $sql = "INSERT INTO postagem(nome, sobrenome, sexo, email, escolaridade, endereco, complemento, cidade, estado, cep, descricao, idUser) VALUES('$nome','$sobrenome','$sexo','$email','$grau', '$endereco', '$complemento', '$cidade', '$estado', '$cep', '$descricao', '$id')";
                            if ($conecta->query($sql) === TRUE) {
                                echo '  <div class="flex-sb-m w-full" style="justify-content: center;">
                                            <div class="alert alert-success fade show" role="alert">
                                                <strong>Sucesso!</strong> Postagem registrada com sucesso!
                                            </div>
                                        </div><br>';
                                echo '  <script>setTimeout(function() {
                                            window.location.href = "anuncios.php";}, 3000);
                                        </script>';
                            }else{
                                echo "ERROOOOOOOOOOO AQUI";
                            }
                        }else{
                            $sql = "UPDATE postagem SET nome='$nome', sobrenome='$sobrenome', sexo='$sexo', email='$email', escolaridade='$grau', endereco='$endereco', complemento='$complemento', cidade='$cidade', estado='$estado', cep='$cep', descricao='$descricao' WHERE idUser='$id'";
                            if ($conecta->query($sql) === TRUE) {
                                echo '  <div class="flex-sb-m w-full" style="justify-content: center;">
                                            <div class="alert alert-success fade show" role="alert">
                                                <strong>Sucesso!</strong> Postagem atualizada com sucesso!
                                            </div>
                                        </div><br>';
                                echo '  <script>setTimeout(function() {
                                            window.location.href = "anuncios.php";}, 3000);
                                        </script>';
                            }else{
                                echo "DANDO ERRO NESSA MERDA";
                            }
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