<?php
    session_start();
    include_once "conectar.php";
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conecta = mysqli_connect($nome_servidor, $nome_usuario, $senhaBanco, $nome_banco); 
    
    if($conecta->connect_error === TRUE){    
        die("Deu erro na conexão ". $conecta->connect_error);
    }
    
    $tenta_achar = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
    $resultado = $conecta->query($tenta_achar);
    if ($resultado->num_rows > 0){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location:anuncios.php');
    }
    else{
        session_unset();
        session_destroy();
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>