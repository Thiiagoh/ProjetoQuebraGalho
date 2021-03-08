<!DOCTYPE html>
<html>
    <head>
        <title>Atualizar usuário!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"> -->
        <?php 
            session_start();
            include_once "conectar.php";
            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                session_unset();
                echo "<script>window.location.href = 'index.php';</script>";
            }
            $logado = $_SESSION['email'];
        ?>
    </head>
    <body>
        <?php
            $escolha = $_POST['escolha'];
            $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco); 
            $tenta_achar = "SELECT * FROM usuario WHERE email='$logado'";
            $resultados = $conecta->query($tenta_achar);
            if ($resultados->num_rows == 1){
                if ($escolha == 1){
                    $sql = "UPDATE usuario SET escolha='1' WHERE email='$logado'";
                    if ($conecta->query($sql) === TRUE){
                        echo "<script>window.location.href = 'anuncios.php';</script>";
                    }
                }
                if ($escolha == 2){
                    $sql = "UPDATE usuario SET escolha='2' WHERE email='$logado'";
                    if ($conecta->query($sql) === TRUE){
                        echo "<script>window.location.href = 'postagem.php';</script>";
                    }
                }
            }
            $conecta->close();
        ?>
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