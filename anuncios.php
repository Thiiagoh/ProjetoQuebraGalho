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
                $nomec = $exibe["nome"];
                $choose = $exibe["escolha"];
                if ($choose == "0"){
                    echo "<script>window.location.href = 'escolha.php';</script>";
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
                                        <img class="avatar" src="images/user.png"/>
                                        <span><?php echo $nomec; ?></span>
                                        <i class="fas fa-caret-down ml-2 mr-2"></i>
                                    </button>
                                    <div class="dropdown-menu mt-0 p-0">
                                        <a href="#" class="dropdown-item">Meu Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="desconectar.php" class="dropdown-item">Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Filme/Serie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="listaadd.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nome</label>
                                    <input class="form-control" type="text" name="nome_ep" placeholder="Informe um nome" maxlength="45" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Temporada</label>
                                    <input class="form-control" type="number" name="temp_ep" placeholder="Informe um número" max="999">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Episódio</label>
                                    <input class="form-control" type="number" name="ep_ep" placeholder="Informe um número" max="999">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tipo</label>
                                    <select name="tipo" class="form-control">
                                        <option value="filme">Filme</option>
                                        <option value="serie">Serie</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="email" value="<?php echo $logado; ?>" id="insertdata" class="btn btn-primary btn-sm">Adicionar</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <?php
                $sql = mysqli_query($conecta, "select * from usuario where email ='$logado'");
                while($exibe = mysqli_fetch_assoc($sql)){
                    $choose = $exibe["escolha"];
                    if ($choose == "2"){
                        echo '  <div class="btn-add">
                                    <a href="postagem.php">
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
                <div class="main-container">
                    <h2 class="title mb-3">MINHA LISTA</h2>
                    <h2 class="title mb-1">Filmes</h2>
                    <hr>
                    <div class="row list mb-5"> 
                       
                    </div>
                    <h2 class="title mb-3">Series</h2>
                    <hr>
                    <div class="row list mb-5">
                        
                    </div>
                </div>
            </div>
        </dvi>
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