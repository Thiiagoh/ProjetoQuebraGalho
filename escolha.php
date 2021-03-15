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
        <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <?php 
            session_start();
            include_once "conectar.php";
            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                session_unset();
                echo "<script>window.location.href = 'index.php';</script>";
            }
            $logado = $_SESSION['email'];
            $sql = mysqli_query($conecta, "select * from usuario where email ='$logado'");
            while($exibe = mysqli_fetch_assoc($sql)){
                $choose = $exibe["escolha"];
                if ($choose != "0"){
                    echo "<script>window.location.href = 'anuncios.php';</script>";
                }
            }
        ?>
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
                    <?php
                        if (isset($_POST['escolher'])){
                            $escolha = $_POST['escolha'];
                            $tenta_achar = "SELECT * FROM usuario WHERE email='$logado'";
                            $resultados = $conecta->query($tenta_achar);
                            if ($resultados->num_rows == 1){
                                if ($escolha == 1){
                                    $sql = "UPDATE usuario SET escolha='1' WHERE email='$logado'";
                                    if ($conecta->query($sql) === TRUE){
                                        echo "<script>window.location.href = 'postagem.php';</script>";
                                    }
                                }
                                if ($escolha == 2){
                                    $sql = "UPDATE usuario SET escolha='2' WHERE email='$logado'";
                                    if ($conecta->query($sql) === TRUE){
                                        echo "<script>window.location.href = 'postagem.php';</script>";
                                    }
                                }
                            }
                        }
                        $conecta->close();
                    ?>
                    <div class="row list mb-5">
                        <div class="limiter">
                            <div class="container-modificado">
                                <div class="wrap-login100 p-t-50 p-b-90">
                                    <div class="row">
                                        <form class="login100-form validate-form flex-sb flex-w" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="col-sm-6">
                                                <div class="card text-center" style="margin-bottom: 0px;">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><i class="fa fa-handshake-o" aria-hidden="true" style="font-size:50px; padding: 10px;"></i></h5>
                                                        <input type="text" name="escolha" value="1" hidden>
                                                        <button type="submit" name="escolher" href="#" class="btn btn-primary">Contratante</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><i class="fa fa-briefcase" aria-hidden="true" style="font-size:50px; padding: 10px;"></i></h5>
                                                        <input type="text" name="escolha" value="2" hidden>
                                                        <button type="submit" name="escolher" href="#" class="btn btn-primary">Trabalhador</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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




