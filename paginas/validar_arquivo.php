<?php
include("../config/conecta.php");
session_start();
$de=$_SESSION['de'];
$para=$_SESSION['para'];

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
    if ( strstr ( '.pdf;.sql;.docx;.txt', $extensao ) ) {
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
          echo "<script>confirm('erro ao tentar adicionar arquivo, por favor tente novamente', window.location.href='hub_chat.php')</script>";
    }
    else
        echo "<script>confirm('erro ao tentar adicionar arquivo,os formatos permitidos são .pdf;.sql;.docx;.txt', window.location.href='hub_chat.php')</script>";
}
else
    echo "<script>confirm('Você não enviou nenhum arquivo!', window.location.href='hub_chat.php')</script>";



$img=$destino;
$hora=date('H:i:s');
$data=date('d/m/y');

    $sql="INSERT INTO `tb_msn`( `cd_para`, `cd_de`, `ds_arquivo`, `hr_hora`, `dt_data`,`nm_arquivo`) VALUES ('$para','$de','$img','$hora','$data','$nome')";
    mysqli_query($con,$sql)or die ("Erro ao tentar insirir menssagem");
    echo"<script> window.location.href='hub_chat.php'</script>";
    