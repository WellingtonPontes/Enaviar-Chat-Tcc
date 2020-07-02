<?php
include("../config/conecta.php");

session_start();
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !=True){
  header("location:../index.html");
}
$login_info=$_SESSION['usu'];
$query="SELECT `cd_usu`, `nm_usu`, `ds_imagem` FROM `tb_usu`";
$info_logado="SELECT cd_usu,nm_usu FROM tb_usu where nm_login='$login_info'";
$sql_info=mysqli_query($con,$info_logado);
$sql=mysqli_query($con,$query);

$data=date('d/m/y');
while($info=mysqli_fetch_array($sql_info,MYSQLI_NUM)){
    $info_resu=$info[0];
    $info_nome=$info[1];
    $_SESSION["de"]=$info_resu;
}
while ($dados = mysqli_fetch_array($sql,MYSQLI_NUM)){
    $unicmsn="SELECT*FROM (SELECT cd_msn,cd_para,cd_de,ds_msn,hr_hora,dt_data FROM tb_msn WHERE (cd_de='$info_resu' and cd_para='$dados[0]') or (cd_de='$dados[0]' and cd_para= '$info_resu')
    order by cd_msn desc limit 1) sub order by cd_msn asc ";
    $queyunic=mysqli_query($con,$unicmsn);
while($ln=mysqli_fetch_array($queyunic,MYSQLI_ASSOC)){
echo"
<a href='hub_chat.php?id_info=$info_resu&id=$dados[0]&nome=$dados[1]'>  
<div class='conversation active w3-hover-amber '>
<img src='".$dados[2]."'>
<div class='title-text'>
".$dados[1]."
</div>
<div class='created-date'>";
if($ln['dt_data']==$data){
    echo "".$ln['hr_hora']."";
}
else{
    echo "".$ln['dt_data']."";
}
echo "</div>
<div class='conversation-message'>
".$ln['ds_msn']."
</div>
</div> 
</a> 
<hr>";
    }
}
 