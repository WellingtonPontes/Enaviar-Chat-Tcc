<?php
include('../config/conecta.php');
ini_set('default_charset', 'UTF-8');

session_start();
if(isset($_GET['id'])){
    $_SESSION['para']=$_GET['id'];
    $_SESSION['de']=$_GET['id_info'];
}

$id_para=$_SESSION['para'];
$id_de=$_SESSION['de'];



?>

<!DOCTYPE html>
<html>
<head>
<html lang="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/chat.css"/>
    <link rel="stylesheet" type="text/css" href="../css/w3.css"/>
    <script type="text/javascript" href="../javascript/bootstrap.js"></script>
    <script type="text/javascript" src="../javascript/main.js"></script>
    <script>
    function ajax(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(
    ){
        if(req.readyState == 4 && req.status==200){
            document.getElementById('conversa').innerHTML=req.responseText;

        }
    }
    req.open('GET','conversa.php', true);
    req.send();

    
}

setInterval(function(){ajax();}, 1000);

    </script>

</head>
<body onload="ajax();">
    
<div class="w3-row ">

<div class="w3-col s1  w3-center">
    <br>
    <br>
    

</div>
<div class="w3-col  s10 ">
            <div class="superior" id="conversa" onmouseover="carregar()" >
           

            </div>
         
           
       
    <form action="chat.php" method="post">
            <div class="row">
                <textarea name="menssagem" class="area" id="conteudo"></textarea>
                
                    <button type="button" class="btn btn-sm">😁</button>
                    <button type="button" class="btn btn-sm">😂</button>
                    <button type="button" class="btn btn-sm">😃</button>
                    <button type="button" class="btn btn-sm">😄</button>
                    <button type="button" class="btn btn-sm">😅</button>
                    <button type="button" class="btn btn-sm">😆</button>
                    <button type="button" class="btn btn-sm">😉</button>
                    <button type="button" class="btn btn-sm">😊</button>
                    <button type="button" class="btn btn-sm">😋</button>
                    <button type="button" class="btn btn-sm">😌</button>
                    <button type="button" class="btn btn-sm">😍</button>
                    <button type="button" class="btn btn-sm">😏</button>
                    <button type="button" class="btn btn-sm">😒</button>
                    <button type="button" class="btn btn-sm">😓</button>
                    <button type="button" class="btn btn-sm">😔</button>
                    <button type="button" class="btn btn-sm">😖</button>
                    <button type="button" class="btn btn-sm">😘</button>
                    <button type="button" class="btn btn-sm">😚</button>
                    <button type="button" class="btn btn-sm">😜</button>
                    <button type="button" class="btn btn-sm">😝</button>
                    <button type="button" class="btn btn-sm">😞</button>
                    <button type="button" class="btn btn-sm">😠</button>
                    <button type="button" class="btn btn-sm">😢</button>
                    <button type="button" class="btn btn-sm">😤</button>
                    <button type="button" class="btn btn-sm">😥</button>
                    <button type="button" class="btn btn-sm">😨</button>
                    <button type="button" class="btn btn-sm">😩</button>
                    <button type="button" class="btn btn-sm">😪</button>
                    <button type="button" class="btn btn-sm">😫</button>
                    <button type="button" class="btn btn-sm">😭</button>
                    <button type="button" class="btn btn-sm">😰</button>
                    <button type="button" class="btn btn-sm">😱</button>
                    <button type="button" class="btn btn-sm">😲</button>
                    <button type="button" class="btn btn-sm">😳</button>
                    <button type="button" class="btn btn-sm">😵</button>
                    <button type="button" class="btn btn-sm">😷</button>
                    <button type="button" class="btn btn-sm">😸</button>
                    <button type="button" class="btn btn-sm">😹</button>
                    <button type="button" class="btn btn-sm">😺</button>
                    <button type="button" class="btn btn-sm">😻</button>
                    <button type="button" class="btn btn-sm">😼</button>
                    <button type="button" class="btn btn-sm">😽</button>
                    <button type="button" class="btn btn-sm">😾</button>
                    <button type="button" class="btn btn-sm">😿</button>
                    <button type="button" class="btn btn-sm">🙀</button>
                    <button type="button" class="btn btn-sm">🙅</button>
                    <button type="button" class="btn btn-sm">🙆</button>
                    <button type="button" class="btn btn-sm">🙇</button>
                    <button type="button" class="btn btn-sm">🙈</button>
                    <button type="button" class="btn btn-sm">🙉</button>
                    <button type="button" class="btn btn-sm">🙊</button>
                    <button type="button" class="btn btn-sm">🙋</button>
                    <button type="button" class="btn btn-sm">🙌</button>
                    <button type="button" class="btn btn-sm">🙍</button>
                    <button type="button" class="btn btn-sm">🙎</button>
                    <button type="button" class="btn btn-sm">🙏</button>
                    <button type="button" class="btn btn-sm">😎</button>
                    <button type="button" class="btn btn-sm">💩</button>
                    <button type="button" class="btn btn-sm">😈</button>
                    <button type="button" class="btn btn-sm">👿</button>
            </div>
                <input class="w3-btn w3-round-large w3-hover-aqua w3-white row w3-block" type="submit" name="enviar" value="enaviar" >   
    </form>
            
    </div>
                <div class="w3-col s1  w3-center">
    <br>
    <br>
    
</div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



            <script>
                $("button").click(function() 
        {
            var emoji = $( this ).text();
            $('#conteudo').val($('#conteudo').val() + emoji);
        }); 
      
       
            </script>
        </div>
<div class="w3-col m2 w3-center">
    
    <div>
</div> 
</body>
</html>



<?php
$hora=date('H:i:s');
$data=date('d/m/y');

if (isset($_POST['menssagem'])){
$msn=$_POST['menssagem'];
$sql="INSERT INTO `tb_msn`( `cd_para`, `cd_de`, `ds_msn`, `hr_hora`, `dt_data`) VALUES ('$id_para','$id_de','$msn','$hora','$data')";
mysqli_query($con,$sql)or die ("Erro ao tentar insirir menssagem");
echo"<script> window.location.href='chat.php'</script>";
}


?>