<?php
session_start();
include("../config/conecta.php");
$id_para=$_SESSION['para'];

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
          echo "<script>confirm('erro ao tentar adicionar imagem, por favor tente novamente', window.location.href='hub_chat.php?id_info=$info_resu&id=$id_para&nome=$nome')</script>";
    }
    else
        echo "<script>confirm('erro ao tentar adicionar imagem,os formatos permitidos são .jpg;*.jpeg;*.gif;*.png', window.location.href='hub_chat.php?id_info=$info_resu&id=$id_para&nome=$nome')</script>";
}
else
    echo "<script>confirm('Você não enviou nenhuma foto!', window.location.href='hub_chat.php?id_info=$info_resu&id=$id_para&nome=$nome')</script>";




$nome=$_POST['nmgrupo'];
$um=$_POST['um'];
$dois=$_POST['dois'];
$tres=$_POST['tres'];
$quatro=$_POST['quatro'];
$img=$destino;
$de=$_SESSION['de'];


if(isset($_POST['nmgrupo'])){
    //criando o grupo
    $sql="INSERT INTO `tb_grupo`(`cd_grupo`, `nm_grupo`, `cd_part1`, `cd_part2`, `cd_part3`, `cd_part4`, `cd_part5`, `ds_imagem_grupo`) VALUES ('','$nome','$um','$dois','$tres','$quatro','$de','$img')";
    mysqli_query($con,$sql) or die ("erro ao tentar cadastrar usuario");

    $procurar="select cd_grupo from tb_grupo where nm_grupo = '$nome'";
    $procurarg=mysqli_query($con,$procurar) or die ('erro ao achar grupo');
    while($dados=mysqli_fetch_array($procurarg,MYSQLI_NUM)){
        $grupo=$dados[0];
    }

    // criando menssagen de grupo
    $sqlmsn="INSERT INTO `tb_grupo_msn`(`cd_msn_grupo`, `cd_grupo`, `ds_msn_grupo`) VALUES ('','$grupo','Agora temos um grupo')";
    mysqli_query($con,$sqlmsn)or die ("Erro ao tentar insirir menssagem");
    echo "<script>alert('cadastrado com sucesso!', window.location.href='hub_chat.php?id_info=$info_resu&id=$id_para&nome=$nome')</script> ";
}else{
    echo "<script>alert('use o cadastro do jeito certo', window.location.href='hub_chat.php')</script> ";    
    }




?>