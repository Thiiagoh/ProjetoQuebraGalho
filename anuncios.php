<!DOCTYPE html>
<html>
    <head>
        <title>Página - Anúncios</title>
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
        <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/teste.css">
        <?php 
            session_start();
            if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                session_unset();
                echo "<script>window.location.href = 'index.php';</script>";
            }
            $logado = $_SESSION['email'];
            include_once "conectar.php";
            $sql = mysqli_query($conecta, "select * from usuario where email ='$logado'");
            while($exibe = mysqli_fetch_assoc($sql)){
                $choose = $exibe["escolha"];
                if ($choose == "0"){
                    echo "<script>window.location.href = 'escolha.php';</script>";
                }
                $perfil = $exibe["avatar"];
                $namec = $exibe["nome"];
            }
        ?>
    </head>
    <body>
        <div class="root">
            <div class="top-bar">
                <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(21,18,45,.59);">
                    <div class="container">
                        <a class="navbar-brand" href="#" style="font-family: 'Ubuntu-Bold';background-color: rgb(255 255 255 / 7%);border-radius: 5px;padding-inline: 10px;">Quebra-galho</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample07">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="anuncios.php">Anúncios <span class="sr-only">(current)</span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Entrevistas
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Mensagens
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="d-flex ml-auto">
                                <div class="dropdown menu">
                                    <button type="button" class="d-flex align-items-center" data-toggle="dropdown">
                                        <img class="avatar" src="images/img_perfil/<?php echo $perfil; ?>"/>
                                        <span><?php echo $namec; ?></span>
                                        <i class="fas fa-caret-down ml-2 mr-2"></i>
                                    </button>
                                    <div class="dropdown-menu mt-0 p-0">
                                        <a href="postagem.php" class="dropdown-item">Meu Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="desconectar.php" class="dropdown-item">Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>





            <?php
                $sql = mysqli_query($conecta, "select * from usuario where email ='$logado'");
                while($exibe = mysqli_fetch_assoc($sql)){
                    $choose = $exibe["escolha"];
                    if ($choose == "2"){
                        echo '  <div class="btn-add">
                                    <a href="#">
                                        <button class="float-button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </a>
                                </div>';
                    }
                }
            ?>

             <div class="main d-flex flex-column">
                <div class="margin-top"></div>
                 <ul class="ulul">
                            <li>
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="Home">Home</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="About">About</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="About">About</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="About">About</span></div>
                                </a>
                            </li>
                        </ul>
                <div class="main-container">
                    <h2 class="title mb-1">Vagas disponíveis</h2>
                    <hr>
                    <!-- <div class="row list mb-3">

                        <?php
                            $i=0;
                            $sql = mysqli_query($conecta, "select * from postagem");
                            while($exibe = mysqli_fetch_assoc($sql)){
                                $idPostagem[$i] = $exibe["idPostagem"];
                                $nomeA[$i] = $exibe["nome"];
                                $avatar[$i] = $exibe["avatar"];
                                $nomeB[$i] = $exibe["sobrenome"];
                                
                                echo '   <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                                <div class="card border-dark mb-3">
                                                    <img src="images/img_perfil/'.$avatar[$i].'" class="card-img-top mb-3">
                                                    <div class="card-body p-0">
                                                        <h5 class="card-title">'.$nomeA[$i].'</h5>
                                                        <p class="card-text">'.$nomeB[$i].'</p>
                                                        <p class="card-text">13/03/2021</p>
                                                    </div>
                                                    <div class="btn-play">
                                                        <form action="#" method="POST">
                                                            <button name="email" value="'.$logado.'" class="d-flex justify-content-center align-items-center">
                                                            <input type="" name="seila" value="'.$idPostagem[$i].'" hidden>
                                                            <i class="fas fa-plus"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>';
                                $i++;
                            }
                        ?>

                    </div> -->
                    <!-- <h2 class="title mb-3">Anúncios</h2>
                    <hr>
                    <div class="row list mb-5">
                        
                    </div> -->
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
    	<script src="js/javascript.js"></script> 
    </body>
</html>