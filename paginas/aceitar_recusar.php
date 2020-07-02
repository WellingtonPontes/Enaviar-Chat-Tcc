<?php
include("../config/conecta.php");
session_start();
$de=$_SESSION['denoty'];
$para=$_SESSION['paranoty'];
$notify=$_SESSION['notify'];
$hora=date('H:i:s');
$data=date('d/m/y');



if(isset($_POST["aceitar"])){
    $msn="Oi!!! agora somos amigos!!!";
    $insirir="INSERT INTO `tb_msn`( `cd_para`, `cd_de`, `ds_msn`, `hr_hora`, `dt_data`) VALUES ('$para','$de','$msn','$hora','$data')";
    $deletar="DELETE FROM `tb_notify` WHERE cd_notify='$notify'";
    mysqli_query($con,$deletar);
    mysqli_query($con,$insirir)or die ("Erro ao tentar aceitar amizade");
    
    echo"<script> window.location.href='hub_chat.php'</script>";
}else{
    $deletar="DELETE FROM `tb_notify` WHERE cd_notify='$notify'";
    mysqli_query($con,$deletar);
    echo"<script> window.location.href='hub_chat.php'</script>";
}

?>