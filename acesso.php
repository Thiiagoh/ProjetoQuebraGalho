<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Página - Inícial</title>
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
        <link rel="stylesheet" href="assets/css/carousel.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <?php 
            session_start();
            include_once "conectar.php";
            if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                session_unset();
                echo "<script>window.location.href = 'index.php';</script>";
            }
            $logado = $_SESSION['email'];
        ?>
    </head>
    <body>
        <div class="root">
            <div class="top-bar">
                <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #272727;">
                    <div class="container">
                        <a class="navbar-brand" href="#">SaveMovies</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample07">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="acesso.php">Início <span class="sr-only">(current)</span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="meusfavoritos.php">Assistir Mais Tarde
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="minhalista.php">Minha Lista
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
                                        <span><?php echo $logado; ?></span>
                                        <i class="fas fa-caret-down ml-2 mr-2"></i>
                                    </button>
                                    <div class="dropdown-menu mt-0 p-0">
                                        <a href="alterarDados.php" class="dropdown-item">Alterar senha</a>
                                        <a href="excluirConta.php" class="dropdown-item">Excluir conta</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="desconectar.php" class="dropdown-item">Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="main" class="main d-flex flex-column">
                <div class="margin-top"></div>
                <div class="container">
                    <div class="main-container">
                        <div class="container-fluid">
                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner row w-100 mx-auto" role="listbox">

                                    <?php 
                                        include_once "conectar.php";
                                        $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco);
                                        $carry = mysqli_query($conecta, "select * from filmes_series order by envio_img DESC");
                                        $i=0;
                                        $ativar[$i]='';
                                        
                                        //Loop de todos os livros
                                        while($exibe = mysqli_fetch_assoc($carry)){
                                            $imagem[$i] = $exibe["imagem"];
                                            if ($ativar[0] == '')
                                                $ativar[$i] = 'active';
                                            else
                                                $ativar[$i] = '';
                                            echo '  <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 '.$ativar[$i].'">
                                                        <img id="img_car" src="images/img_filme/'.$imagem[$i].'.jpg" class="card border-dark card-img-top img-fluid mx-auto d-block" data-toggle="modal" data-target="#'.$imagem[$i].'" alt="img1">
                                                    </div>';
                                        $i++;
                                        }
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-container">
                    <div class="d-flex align-items-center mb-1">
                        <div>
                            <h2 class="title mb-3">FILMES LANÇAMENTOS</h2>
                        </div>
                    </div>
                    <div class="row list mb-3">
                        <?php 
                            include_once "conectar.php";
                            $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco);
                            $carry = mysqli_query($conecta, "select * from filmes_series order by envio_img DESC");
                            $i=0;
                            //Loop de todos os livros
                            while($exibe = mysqli_fetch_assoc($carry)){
                                $titulo[$i] = $exibe["titulo"];
                                $data[$i] = $exibe["data"];
                                $genero[$i] = $exibe["genero"];
                                $tipo[$i] = $exibe["tipo"];
                                $imagem[$i] = $exibe["imagem"];
                                $id_filme[$i] = $exibe["id_filme_serie"];

                                if ($tipo[$i] == "filme"){
                                    $avaliation = mysqli_query($conecta, 'select * FROM filmes_series_avaliacao fa inner join filmes_series fs on fa.id_filme_serie = fs.id_filme_serie where fa.id_filme_serie = '.$id_filme[$i].'');
                                    $cont=0;
                                    $x=0;
                                    //loop para as avaliações de cada filme
                                    while($votos[$i] = mysqli_fetch_assoc($avaliation)){
                                        $nota[$x] = $votos[$i]["nota"];
                                        //COMPUTAR NOTAS DE FILMES
                                        if ($nota[$x] == "1")
                                            $cont++;
                                        else if ($nota[$x] == "0")
                                            $cont--;
                                        $x++;
                                    }

                                    //Se for positivo ficara BOM negativo RUIM
                                    if($cont < 0){
                                        $colorR = 'FF0000';
                                        $icon = 'down';
                                        $cont = ''; // para não aparecer numeros negativos.
                                    }
                                    else{
                                        $icon = 'up';
                                        $colorR = '00FF00';
                                    }

                                    echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                            <div class="card border-dark">
                                                <div class="btn-rating">
                                                    <button style="color: #fff;background-color: #'.$colorR.';" data-toggle="modal" data-target="#'.$imagem[$i].'" class="d-flex justify-content-center align-items-center">
                                                        <i class="fas fa-thumbs-'.$icon.'"></i>
                                                    </button>
                                                </div>
                                                <img src="images/img_filme/'.$imagem[$i].'.jpg" class="card-img-top mb-3" data-toggle="modal" data-target="#'.$imagem[$i].'"/>
                                                <div class="card-body p-0">
                                                    <h5 class="card-title">'.$titulo[$i].'</h5>
                                                    <p class="card-text">'.$genero[$i].'</p>
                                                    <p class="card-text">'.$data[$i].'</p>
                                                </div>
                                                <div class="btn-play">
                                                    <form action="favoritosadd.php" method="POST">
                                                        <button name="email" value="'.$logado.'" class="d-flex justify-content-center align-items-center">
                                                            <input type="" name="filme" value="'.$id_filme[$i].'" hidden>
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                $i++;
                            }
                        ?>
                    </div>
                    <div class="d-flex align-items-center mb-1">
                        <div>
                            <h2 class="title mb-3">SÉRIES MAIS POPULARES ATUALMENTE</h2>
                        </div>
                    </div>
                    <div class="row list mb-4">
                        <?php 
                            $carry = mysqli_query($conecta, "select * from filmes_series order by envio_img DESC");
                            $i=0;
                            //Loop de todos os livros
                            while($exibe = mysqli_fetch_assoc($carry)){
                                $titulo[$i] = $exibe["titulo"];
                                $data[$i] = $exibe["data"];
                                $genero[$i] = $exibe["genero"];
                                $tipo[$i] = $exibe["tipo"];
                                $imagem[$i] = $exibe["imagem"];
                                $id_filme[$i] = $exibe["id_filme_serie"];
                                $videourl[$i] = $exibe["videourl"];
                                $descricao[$i] = $exibe["descricao"];



                                if ($tipo[$i] == "serie"){
                                    $avaliation = mysqli_query($conecta, 'select * FROM filmes_series_avaliacao fa inner join filmes_series fs on fa.id_filme_serie = fs.id_filme_serie where fa.id_filme_serie = '.$id_filme[$i].'');
                                    $cont=0;
                                    $x=0;
                                    //loop para as avaliações de cada filme
                                    while($votos[$i] = mysqli_fetch_assoc($avaliation)){
                                        $nota[$x] = $votos[$i]["nota"];
                                        //COMPUTAR NOTAS DE FILMES
                                        if ($nota[$x] == "1")
                                            $cont++;
                                        else if ($nota[$x] == "0")
                                            $cont--;
                                        $x++;
                                    }

                                    //Se for positivo ficara BOM negativo RUIM
                                    if($cont < 0){
                                        $colorR = 'FF0000';
                                        $icon = 'down';
                                        $cont = ''; // para não aparecer numeros negativos.
                                    }
                                    else{
                                        $icon = 'up';
                                        $colorR = '00FF00';
                                    }

                                    echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                            <div class="card border-dark">
                                                <div class="btn-rating">
                                                    <button style="color: #fff;background-color: #'.$colorR.';" data-toggle="modal" data-target="#'.$imagem[$i].'" class="d-flex justify-content-center align-items-center">
                                                        <i class="fas fa-thumbs-'.$icon.'"></i>
                                                    </button>
                                                </div>
                                                <img src="images/img_filme/'.$imagem[$i].'.jpg" class="card-img-top mb-3" data-toggle="modal" data-target="#'.$imagem[$i].'"/>
                                                <div class="card-body p-0">
                                                    <h5 class="card-title">'.$titulo[$i].'</h5>
                                                    <p class="card-text">'.$genero[$i].'</p>
                                                    <p class="card-text">'.$data[$i].'</p>
                                                </div>
                                                <div class="btn-play">
                                                    <form action="favoritosadd.php" method="POST">
                                                        <button name="email" value="'.$logado.'" class="d-flex justify-content-center align-items-center">
                                                            <input type="" name="filme" value="'.$id_filme[$i].'" hidden>
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                $i++;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!--INICIO MODAL PARA FILMES-->
        <?php 
            $d2 = mysqli_query($conecta, "select * from filmes_series order by envio_img DESC");
            $i=0;
            //Loop de todos os livros
            while($exibe = mysqli_fetch_assoc($d2)){
                $id_filme[$i] = $exibe["id_filme_serie"];
                $titulo[$i] = $exibe["titulo"];
                $tipo[$i] = $exibe["tipo"];
                $imagem[$i] = $exibe["imagem"];
                $descricao[$i] = $exibe["descricao"];
                $videourl[$i] = $exibe["videourl"];

                echo '<div class="modal fade" id="'.$imagem[$i].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="item active">
                                    <div class="fill">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">'.$titulo[$i].'</h5>
                                        </div>
                                        <form action="ratingadd.php" method="POST">
                                            <div class="modal-body">
                                                <iframe id="videoIframe'.$imagem[$i].'" width="100%" height="100%" src="'.$videourl[$i].'" frameborder="0" allowfullscreen></iframe>
                                                <label for="exampleFormControlInput1">Descrição</label>
                                                <p>'.$descricao[$i].'</p>
                                                <label for="exampleFormControlInput1">Avalie</label>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="" name="email" value="'.$logado.'" hidden>
                                                <input type="" name="filme" value="'.$id_filme[$i].'" hidden>
                                                <button type="submit" name="avaliacao" value="1" id="insertdata" class="btn btn-success btn-sm">Gostei</button>
                                                <button type="submit" name="avaliacao" value="0" id="insertdata" class="btn btn-danger btn-sm">Não gostei</button>
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                $i++;
            }
        ?>
        <!--FIM MODAL PARA FILMES-->
        <!-- Javascript -->
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script>
            <?php 
                $d3 = mysqli_query($conecta, "select * from filmes_series order by envio_img DESC");
                $i=0;
                //Loop de todos os livros
                while($exibe = mysqli_fetch_assoc($d3)){
                    $imagem[$i] = $exibe["imagem"];

                    echo '  $("#'.$imagem[$i].'").on("show.bs.modal", function() {
                                $("#videoIframe'.$imagem[$i].'")[0].src += "&autoplay=1";
                            });
                            $("#'.$imagem[$i].'").on("hidden.bs.modal", function(e) {
                                var rawVideoURL = $("#videoIframe'.$imagem[$i].'")[0].src;
                                rawVideoURL = rawVideoURL.replace("&autoplay=1", "");
                                $("#videoIframe'.$imagem[$i].'")[0].src = rawVideoURL;
                            });';
                    $i++;
                }
            ?>
        </script>
    </body>
</html>