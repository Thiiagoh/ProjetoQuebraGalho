<!DOCTYPE html>
<html>
    <head>
        <title>Página - Informações Pessoais</title>
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
            $sql = mysqli_query($conecta, "select * from usuario where email ='$logado'");
            while($exibe = mysqli_fetch_assoc($sql)){
                $id = $exibe["idUser"];
                $choose = $exibe["escolha"];
                if ($choose == "0"){
                    echo "<script>window.location.href = 'escolha.php';</script>";
                }
            }
            $tenta_achar = "SELECT * FROM usuario WHERE idUser='$id'";
            $resultado = $conecta->query($tenta_achar);
            if ($resultado->num_rows >= 1){
                $trocado = mysqli_query($conecta, "select * from usuario where idUser ='$id'");
                while($exibe = mysqli_fetch_assoc($trocado)){
                    $nome = $exibe["nome"];
                    $sobrenome = $exibe["sobrenome"];
                    $sexo = $exibe["sexo"];
                    $email = $exibe["emailcontato"];
                    $escolaridade = $exibe["escolaridade"];
                    $endereco = $exibe["endereco"];
                    $complemento = $exibe["complemento"];
                    $cidade = $exibe["cidade"];
                    $estado = $exibe["estado"];
                    $cep = $exibe["cep"];
                    $descricao = $exibe["descricao"];
                    $numero = $exibe["numero"];
                    $avatar = $exibe["avatar"];
                }
            }else{
                $nome = "";
                $sobrenome = "";
                $sexo = "Selecione";
                $email = "";
                $escolaridade = "selecione";
                $endereco = "";
                $complemento = "";
                $cidade = "";
                $estado = "Selecione";
                $cep = "";
                $descricao = "";
                $numero = "";
                $avatar = "user.png";
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
                                    <a class="nav-link" href="anuncios.php">Anúncios <span class="sr-only">(current)</span>
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
                            
                        </div>
                    </div>
                </nav>
            </div>

            <div class="main d-flex flex-column">
                <div class="margin-top"></div>
                <div class="main-container">
                    <h2 class="title text-center">Informações Pessoais</h2>
                    <hr>
                    <div class="limiter2">
                        <?php
                            if (isset($_POST['enviado'])){
                                $nome = $_POST['nome'];
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
                                $numero = $_POST['numero'];

                                //Conectar no mysql
                                $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco); 
                                $sql = "UPDATE usuario SET nome='$nome', sobrenome='$sobrenome', sexo='$sexo', emailcontato='$email', escolaridade='$grau', endereco='$endereco', complemento='$complemento', cidade='$cidade', estado='$estado', cep='$cep', descricao='$descricao', numero='$numero' WHERE idUser='$id'";
                                    if ($conecta->query($sql) === TRUE) {
                                        echo '  <div class="flex-sb-m w-full" style="justify-content: center;">
                                                    <div class="alert alert-success fade show" role="alert">
                                                        <strong>Sucesso!</strong> Informações atualizadas com sucesso!
                                                    </div>
                                                </div><br>';
                                    }else{
                                        echo ' <div class="flex-sb-m w-full" style="justify-content: center;">
                                                    <div class="alert alert-warning fade show" role="alert">
                                                        <strong>Erro!</strong> Falha ao atualizar!
                                                    </div>
                                                </div><br>';
                                    }
                                $conecta->close();
                            }
                        ?>
                        <?php 
                            if (isset($_POST['enviar-formulario'])):
                                $formatosPermitidos = array("png", "jpeg", "jpg");
                                $extensao = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                                if (in_array($extensao, $formatosPermitidos)):
                                    $pasta = "images/img_perfil/";
                                    $temporario = $_FILES['avatar']['tmp_name'];
                                    $novoNome = uniqid().".$extensao";
                                    if(move_uploaded_file($temporario, $pasta.$novoNome)):
                                        $sql = "UPDATE usuario SET avatar='$novoNome' WHERE idUser='$id'";
                                        if ($conecta->query($sql) === TRUE) {
                                            if($avatar != "user.png"){
                                                unlink("images/img_perfil/".$avatar);
                                                $avatar = $novoNome;
                                            }
                                            echo '  <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Sucesso!</strong> Sua foto foi enviada.
                                            </div>';
                                        }else{
                                           echo '  <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Erro ao enviar!</strong> Sua foto não foi enviada.
                                            </div>';
                                        }
                                        
                                    else:
                                         echo '  <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Erro ao enviar!</strong> Sua foto não foi enviada.
                                            </div>';
                                    endif;
                                else:
                                    echo '  <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Erro ao enviar!</strong> Formato inválido.
                                            </div>';
                                endif;
                            endif;
                        ?>
                        <div class="seilaaa">
                            <div class="img-imgg">
                                <img src="images/img_perfil/<?php echo $avatar;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                <label for="inputAddress">Foto de perfil</label>
                                <input type="file" name="avatar">
                                <input type="submit" name="enviar-formulario">
                            </form>
                        </div>
                        <hr>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group row g-3">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Nome*</label>
                                    <input type="text" maxlength="30" name="nome" value="<?php echo $nome;?>" class="form-control" id="inputEmail4" placeholder="Nome" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Sobrenome*</label>
                                    <input type="text" name="sobrenome" value="<?php echo $sobrenome;?>" class="form-control" id="inputPassword4" placeholder="Sobrenome" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Selecione o sexo</label>
                                <select name="sexo" class="form-control" id="exampleFormControlSelect1">
                                    <option value="<?php echo $sexo;?>"><?php echo $sexo;?></option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                            <div class="form-group row g-3">
                                <div class="col-md-6">
                                <label for="exampleFormControlInput1">Email de contato*</label>
                                <input type="email" name="email" value="<?php echo $email;?>" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label">Número de telefone*</label>
                                    <input type="text" name="numero" value="<?php echo $numero;?>" class="form-control cel-sp-mask" id="exampleFormControlInput1" placeholder="(DDD) 00000-0000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Selecione o seu grau de escolaridade</label>
                                <select name="grau" value="<?php echo $escolaridade;?>" class="form-control" id="exampleFormControlSelect1">
                                    <option value="<?php echo $escolaridade;?>"><?php echo $escolaridade;?></option>
                                    <option value="Ensino Fundamental">Ensino Fundamental</option>
                                    <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                                    <option value="Ensino Médio">Ensino Médio</option>
                                    <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                                    <option value="Ensino Superior">Ensino Superior</option>
                                    <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Endereço</label>
                                <input type="text" name="endereco" value="<?php echo $endereco;?>" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Complemento</label>
                                <input type="text" name="complemento" value="<?php echo $complemento;?>" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
                            </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Cidade*</label>
                                        <input type="text" name="cidade" value="<?php echo $cidade;?>" placeholder="Cidade" class="form-control" id="inputCity" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEstado">Estado*</label>
                                        <select id="inputEstado" name="estado"  class="form-control" required>
                                            <option value="<?php echo $estado;?>"><?php echo $estado;?></option>
                                            <option value="Acre">Acre</option>
                                            <option value="Alagoas">Alagoas</option>
                                            <option value="Amapá">Amapá</option>
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Bahia">Bahia</option>
                                            <option value="Ceará">Ceará</option>
                                            <option value="Distrito Federal">Distrito Federal</option>
                                            <option value="Espirito Santo">Espirito Santo</option>
                                            <option value="Goiás">Goiás</option>
                                            <option value="Maranhão">Maranhão</option>
                                            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                            <option value="Mato Grosso">Mato Grosso</option>
                                            <option value="Minas Gerai">Minas Gerais</option>
                                            <option value="Pará">Pará</option>
                                            <option value="Paraíba">Paraíba</option>
                                            <option value="Paraná">Paraná</option>
                                            <option value="Pernambuco">Pernambuco</option>
                                            <option value="Piauí">Piauí</option>
                                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                            <option value="Rondônia">Rondônia</option>
                                            <option value="Roraima">Roraima</option>
                                            <option value="Santa Catarina">Santa Catarina</option>
                                            <option value="São Paulo">São Paulo</option>
                                            <option value="Sergipe">Sergipe</option>
                                            <option value="Tocantins">Tocantins</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputCEP">CEP*</label>
                                        <input type="cep" name="cep" value="<?php echo $cep;?>" placeholder="00000-000" class="form-control cep-mask" id="inputCEP" required>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição*</label>
                                <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3" required><?php echo $descricao;?></textarea>
                            </div>

                             <button type="submit" name="enviado" class="btn btnbtn">Enviar</button>
                        </form>
                    </div>
                    <hr>
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
        <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    </body>
</html>