<?php

include("../config/conecta.php");
session_start();
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !=True){
  header("location:../index.html");
}
else{
  
}

$login_info=$_SESSION['usu'];
$query="SELECT `cd_usu`, `nm_usu`, `ds_imagem` FROM `tb_usu`";
$info_logado="SELECT cd_usu FROM tb_usu where nm_login='$login_info'";
$sql_info=mysqli_query($con,$info_logado);
$sql=mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
 
    <link rel="stylesheet" type="text/css" href="../css/w3.css"/>
    <link rel="stylesheet" href="../css/inicio.css">
    
   

</head>
<body>

<div class="w3-rest w3-container w3-green">

	<div class="w3-container well ">
		<h2>Filter List</h2>
		<p>Search for a name in the input field.</p>
	  
		<input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="myInput" onkeyup="myFunction()">
		<ul class="w3-ul w3-margin-top" id="myUL">
    <?php
   while($info=mysqli_fetch_array($sql_info,MYSQLI_NUM)){
    $info_resu=$info[0];
    $_SESSION["de"]=$info_resu;
}
while ($dados = mysqli_fetch_array($sql,MYSQLI_NUM)){
  $unicmsn="SELECT*FROM (SELECT cd_msn,cd_para,cd_de,ds_msn,hr_hora,dt_data FROM tb_msn WHERE (cd_de='$info_resu' and cd_para='$dados[0]') or (cd_de='$dados[0]' and cd_para= '$info_resu')
  order by cd_msn desc limit 1) sub order by cd_msn asc ";
  $queyunic=mysqli_query($con,$unicmsn);
while($ln=mysqli_fetch_array($queyunic,MYSQLI_ASSOC)){
  echo"    <li>
    <a href='chat.php?id_info=$info_resu&id=$dados[0]'>
			  <div class='container w3-blue w3-hover-aqua'>
				  <img src='".$dados[2]."' alt='Avatar'>
				  <h6>".$dados[1]."</h6>
				  <p>".$ln['ds_msn']."</p>
				  <span class='time-right'>11:00</span>
			  </div>
	  </a>
		  </li>";
  }
}
		 ?>
		</ul>
	  </div>

<!-- </div>
</div> -->


<script>
function myFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    txtValue = li[i].textContent || li[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
 

</body>
</html>