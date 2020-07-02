<?php
include("../config/conecta.php");
session_start();
$de= '2';
$para='7';
$data=date('d/m/y');
                
                $selecionando_conversa_chat="SELECT*FROM (SELECT cd_msn,cd_para,cd_de,ds_msn,hr_hora,dt_data,ds_arquivo,nm_arquivo FROM tb_msn WHERE (cd_de='$de' and cd_para='$para') or (cd_de='$para' and cd_para= '$de')
                order by cd_msn desc ) sub order by cd_msn desc";
                
                $nome_imagem_de="SELECT ds_imagem,nm_usu FROM `tb_usu` WHERE cd_usu=$de";
                $nome_imagem_para="SELECT ds_imagem,nm_usu FROM `tb_usu` WHERE cd_usu=$para";
                $resul_de_imagem=mysqli_query($con,$nome_imagem_de);
                $resul_para_imagem=mysqli_query($con,$nome_imagem_para);
                
                while($pegar=mysqli_fetch_array($resul_de_imagem,MYSQLI_NUM)){
                    $imagem_de=$pegar[0];
                    $nome_de=$pegar[1];
                }
                while($pegar=mysqli_fetch_array($resul_para_imagem,MYSQLI_NUM)){
                    $imagem_para=$pegar[0];
                    $nome_para=$pegar[1];
                }
                $result=mysqli_query($con,$selecionando_conversa_chat);
                $conta=mysqli_num_rows($result);
                
            // fim da  conversa
    