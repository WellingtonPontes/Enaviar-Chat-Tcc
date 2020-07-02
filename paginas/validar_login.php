<?php
include("../config/conecta.php");
session_start();
$_SESSION['logado']=false;


if(isset($_POST['login'])){
    $login_usuario=mysqli_real_escape_string($con,$_POST['login']);
    $senha_usuario=mysqli_real_escape_string($con,$_POST['senha']);

    $selecionar_usuario="SELECT * from tb_usu WHERE nm_login='$login_usuario' and cd_senha='$senha_usuario'";
    $procurar=mysqli_query($con,$selecionar_usuario);
    $checa_usuario=mysqli_num_rows($procurar);
    if($checa_usuario>0){
        $_SESSION['logado']=true;
        $_SESSION['usu']=$login_usuario;
        header("location:hub_chat.php");
    }
    else{
        echo "<script>confirm('Login ou Senha com erro, tente novamente!', window.location.href='../index.html')</script>";
    }


}