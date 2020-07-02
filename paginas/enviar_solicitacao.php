<?php
include("../config/conecta.php");
session_start();
$de=$_SESSION['de'];
$data=date('d/m/y');
$hora=date('H:i:s');
$nome=$_POST['nome'];

$achando_nome="SELECT nm_usu,cd_usu from tb_usu WHERE nm_usu='$nome' ";
$achando_img="SELECT ds_imagem from tb_usu where cd_usu='$de'";
$query_img=mysqli_query($con,$achando_img);
$query_nome=mysqli_query($con,$achando_nome);
while ($imagem=mysqli_fetch_array($query_img,MYSQLI_NUM)){
    $IMG=$imagem[0];
}
$conta=mysqli_num_rows($query_nome);
if($conta==0){
    echo "<script>window.location.href='hub_chat.php',alert('por favor não adicione quem não conhece')</script>";
}else{
    
    while($pegar=mysqli_fetch_array($query_nome,MYSQLI_NUM)){
        $para=$pegar[1];
        $insirir="INSERT INTO `tb_notify`( `cd_de`, `cd_para`, `ds_notify`, `dt_data`, `hr_hora`, `ds_img`) VALUES ('$de','$para','oi vamos ser amigos!!!','$data','$hora','$IMG')";
        mysqli_query($con,$insirir)or die ("Erro ao tentar insirir menssagem");
        echo"<script> window.location.href='hub_chat.php'</script>";
    }
}

