<!DOCTYPE html>
<html>
    <head>
        <title>Página - Postagem</title>
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
                $id = $exibe["idUser"];
                $choose = $exibe["escolha"];
                if ($choose == "0"){
                    echo "<script>window.location.href = 'escolha.php';</script>";
                }
            }
            $tenta_achar = "SELECT * FROM postagem WHERE idUser='$id'";
            $resultado = $conecta->query($tenta_achar);
            if ($resultado->num_rows >= 1){
                $trocado = mysqli_query($conecta, "select * from postagem where idUser ='$id'");
                while($exibe = mysqli_fetch_assoc($trocado)){
                    $nome = $exibe["nome"];
                    $sobrenome = $exibe["sobrenome"];
                    $sexo = $exibe["sexo"];
                    $email = $exibe["email"];
                    $escolaridade = $exibe["escolaridade"];
                    $endereco = $exibe["endereco"];
                    $complemento = $exibe["complemento"];
                    $cidade = $exibe["cidade"];
                    $estado = $exibe["estado"];
                    $cep = $exibe["cep"];
                    $descricao = $exibe["descricao"];
                }
            }else{
                $nome = "";
                $sobrenome = "";
                $sexo = "";
                $email = "";
                $escolaridade = "";
                $endereco = "";
                $complemento = "";
                $cidade = "";
                $estado = "";
                $cep = "";
                $descricao = "";
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
                            
                        </div>
                    </div>
                </nav>
            </div>

            
            

            <div class="main d-flex flex-column">
                <div class="margin-top"></div>
                <div class="main-container">
                    <h2 class="title text-center">Cadastrar</h2>
                    <hr>
                    <div class="limiter2">
                        <form action="cadsPostagem.php" method="POST">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nome</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" maxlength="30" name="nome" value="<?php echo $nome;?>" class="form-control" placeholder="Nome">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="sobrenome" value="<?php echo $sobrenome;?>" class="form-control" placeholder="Sobrenome">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Selecione o sexo</label>
                                <select name="sexo" class="form-control" id="exampleFormControlSelect1">
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                    <option value="O">Outro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email de contato</label>
                                <input type="email" name="email" value="<?php echo $email;?>" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Selecione o seu grau de escolaridade</label>
                                <select name="grau" value="<?php echo $escolaridade;?>" class="form-control" id="exampleFormControlSelect1">
                                    <option value="EF">Ensino Fundamental</option>
                                    <option value="EFC">Ensino Fundamental Completo</option>
                                    <option value="EM">Ensino Médio</option>
                                    <option value="EMC">Ensino Médio Completo</option>
                                    <option value="ES">Ensino Superior</option>
                                    <option value="ESC">Ensino Superior Completo</option>
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
                                        <label for="inputCity">Cidade</label>
                                        <input type="text" name="cidade" value="<?php echo $cidade;?>" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEstado">Estado</label>
                                        <select id="inputEstado" name="estado" value="<?php echo $estado;?>" class="form-control">
                                            <option value="">Selecione</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espirito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputCEP">CEP</label>
                                        <input type="text" maxlength="8" name="cep" value="<?php echo $cep;?>" class="form-control" id="inputCEP">
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição</label>
                                <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"><?php echo $descricao;?></textarea>
                            </div>
                             <button type="submit" name="id" value="<?php echo $id; ?>" class="btn btnbtn">Enviar</button>
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
    </body>
</html>