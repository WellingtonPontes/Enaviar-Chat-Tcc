<?php
include("../config/conecta.php");

if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
    // echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
    // echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
    // echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
    // echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
        // Concatena a pasta com o nome
        $destino = '../img/ ' . $novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            // echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            // echo ' < img src = "' . $destino . '" />';
        }
        else
          echo "<script>confirm('erro ao tentar adicionar imagem, por favor tente novamente', window.location.href='cadastro.html')</script>";
    }
    else
        echo "<script>confirm('erro ao tentar adicionar imagem,os formatos permitidos são .jpg;*.jpeg;*.gif;*.png', window.location.href='cadastro.html')</script>";
}
else
    echo "<script>confirm('Você não enviou nenhuma foto!', window.location.href='cadastro.html')</script>";




$nome=$_POST['nome'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$img=$destino;

if(isset($_POST['nome'])){
    $sql="INSERT INTO `tb_usu`( `nm_usu`, `ds_imagem`, `cd_senha`, `nm_login`) VALUES ('$nome','$img','$senha','$login')";
    mysqli_query($con,$sql) or die ("erro ao tentar cadastrar usuario");
    echo "<script>alert('cadastrado com sucesso!', window.location.href='../index.html')</script> ";
}else{
    echo "<script>alert('use o cadastro do jeito certo', window.location.href='../index.html')</script> ";    
    }




?>