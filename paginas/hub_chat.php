<?php 
include('../config/conecta.php');
ini_set('default_charset', 'UTF-8');
session_start();
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !=True){
  header("location:../index.html");
}
$login_info=$_SESSION['usu'];
$query="SELECT `cd_usu`, `nm_usu`, `ds_imagem` FROM `tb_usu`";
$info_logado="SELECT cd_usu,nm_usu FROM tb_usu where nm_login='$login_info'";
$sql_info=mysqli_query($con,$info_logado);
$sql=mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- testando -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- fim do teste -->
    <!-- materalize -->
    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <!-- fim do materalzie -->
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/hub.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enaviar</title>
    <link href="https://fonts.googleapis.com/css2?family=Chathura:wght@800&family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="../js/main.js"></script> -->
    <script>
    $(".icones").click(function(){
    $(".content-modal").show();
    $(".hub").hide();

 });
 $(".close").click(function(){
    $(".content-modal").hide();
    $(".hub").show();
 });  
        function estouVendo() {
        
    
        document.addEventListener('keyup', e=>{
            // console.log(e.key);
            
            switch (e.key) {
                case 'Enter':
                enaviar();
                
                    break;
            
                default:
                    break;
            }
        })

        function enaviar() {
            
        let texto=document.querySelector('.pegando').value;
        let palavrao=["porra","puta","foda-se","<p>","<div>","<h1>"];
        let status = false

        palavrao.forEach(valor => texto.indexOf(valor) !== -1 ? status = true : status = status)
        if( status ) {
        let falou = true;
        console.log("Falou palavrão!");
        if (falou = true ){
        alert('Por favor não fale palavrão ou coloque codigos de programa aqui')
        window.location.href='hub_chat.php';
        }
        } else {
            
        console.log("Não falou palavrão!");
        document.formulario1.submit();
        }

        }
    }
    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(
        ){
            if(req.readyState == 4 && req.status==200){
                document.getElementById('chat-message-list').innerHTML=req.responseText;
    
            }
        }
        req.open('GET','conversa.php', true);
        req.send();
    // chamando lista de amigos

    var requi = new XMLHttpRequest();
        requi.onreadystatechange = function(
        ){
            if(requi.readyState == 4 && requi.status==200){
                document.getElementById('lista_amigos').innerHTML=requi.responseText;
    
            }
        }
        requi.open('GET','lista_amigos.php', true);
        requi.send();
    
        
        }   setInterval(function(){ajax();}, 1000);
    </script>
   
</head>
<body>
    <div class="lateral">
        <div class="amigos">
        <?php
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
    // grupo

    $queryg="SELECT cd_grupo, nm_grupo, ds_imagem_grupo FROM tb_grupo where cd_part1=$info_resu or (cd_part2=$info_resu or cd_part3=$info_resu OR cd_part4=$info_resu OR cd_part5=$info_resu)";
    $sqlg=mysqli_query($con,$queryg);
    while($dadosg=mysqli_fetch_array($sqlg,MYSQLI_NUM)){
        $seleciona_conversa_grupo="SELECT cd_msn_grupo, ds_msn_grupo,cd_de_grupo,hr_hora,dt_hora FROM tb_grupo_msn WHERE cd_grupo='$dadosg[0]' order by cd_msn_grupo desc limit 1 ";
        $query_grupo_conversa=mysqli_query($con,$seleciona_conversa_grupo);
        $conta=mysqli_num_rows($query_grupo_conversa);
    while($ln=mysqli_fetch_array($query_grupo_conversa,MYSQLI_ASSOC)){
            echo"
    <a href='hub_grupo.php?id_info=$info_resu&id=$dadosg[0]&nome=$dadosg[1]'>  
    <div class='conversation active w3-hover-aqua '>
    <img src='".$dadosg[2]."'>
    <div class='title-text'>
        ".$dadosg[1]."
    </div>
    <div class='created-date'>";
        if($ln['dt_hora']==$data){
            echo "".$ln['hr_hora']."";
        }
        else{
            echo "".$ln['dt_hora']."";
        }
    echo "</div>
    <div class='conversation-message'>
        ".$ln['ds_msn_grupo']."
    </div>
    </div> 
    </a> ";
        }

    }
     
    // session


if(isset($_GET['id'])){
    $_SESSION['para']=$_GET['id'];
    $_SESSION['de']=$_GET['id_info'];
   
}else{
    
    $_SESSION['para']=$info_resu;
    $_SESSION['de']=$info_resu;
}

$id_para=$_SESSION['para'];
$id_de=$_SESSION['de'];

?>
        </div>
    
    </div>
    <div class="hub">
    <div class="w3-container nome  ">
        <h2 class="nome-titular"> <span><?php 
                if(isset ($_GET['nome'])){
                $_SESSION['nome']=$_GET['nome'];
                $nome=$_SESSION['nome'];
                }else{
                    $_SESSION['nome']=$info_nome;
                    $nome=$_SESSION['nome'];
                }
                $title=$_SESSION['nome'];
                echo $title; ?><span class="ipg"> O IPG é 
                    <?php 
                    if(isset($_GET['id'])){
                        echo $_GET['id'];
                    }else{
                        echo $info_resu;
                    } 
                    ?>
                </span></span>
                 </h2> <p class="icones"><i class=" material-icons">dehaze</i></p>
        <div class="modo-dois">
        <!-- <div class="modo">
            <label>Modo Escuro</label>
            <div class="switch">
                <label>
                Off
                <input type="checkbox">
                <span class="lever"></span>
                On
                </label>
            </div>
        </div> -->
        <div class="sair">
       <a href="sair.php"> <i class="medium material-icons">exit_to_app</i></a>
        </div>
    </div>
    </div>
    <div id="chat-message-list" class="conteudo-menssagem w3-container w3-border">
        
        <!-- <div class="sua-mensagem">
            <div class="texto-mensagem">
                ola mundo!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, labore quae totam nobis culpa ad sint, odit veniam hic itaque dolorum, voluptate sapiente ea asperiores! Id exercitationem quis iusto adipisci?
            </div>
            <div class="hora-data">
                12/05/2020
            </div>
        </div>
      
        <div class="outra-mensagem">
            <div class="texto-mensagem">
                ola mundo!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, labore quae totam nobis culpa ad sint, odit veniam hic itaque dolorum, voluptate sapiente ea asperiores! Id exercitationem quis iusto adipisci?
            </div>
            <div class="outra-hora ">
                12/05/2020
            </div>
        </div> -->
        
    </div>
    <br>
    <div class="enviar w3-container">
                <div class="drop"> 
                <div class="btn-group dropup">
                <button type="button" class="btn btn-secondary w3-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mais
                </button>
                <div class="dropdown-menu">
                <button onclick="document.getElementById('id03').style.display='block'" class="dropdown-item" type="button">Enviar arquivo</button>
                <button onclick="document.getElementById('id04').style.display='block'" class="dropdown-item" type="button">Adicionar amigos</button>
                <button onclick="document.getElementById('id02').style.display='block'" class="dropdown-item" type="button">Criar grupo</button>
                <!-- Links do menu dropleft -->
                </div>

                </div>

                </div>
                <!-- text area -->
                <div class="apps-two">
                <button  onclick="document.getElementById('id01').style.display='block'" class="btn-floating btn-large w3-blue"><i id="myBtn" class="material-icons">mood</i></button>
                </div>
                <?php

               echo "<form action='hub_chat.php?id_info=$info_resu&id=$id_para&nome=$nome' name='formulario1' method='post'>";
                ?>
                <div class="texto">
                    <textarea id="conteudo" class="pegando" name="menssagem" onkeypress="estouVendo()" ></textarea>
           
                </div>
                </form>
    </div>
</div>
        

        
         <div class="content-modal">
            
             <div class="conteudo">

                <div class="menu-up">
                  
                    </div>
                    <div class="menu-botoes">
                    
                        <a href="sair.php"> <i class="medium material-icons">exit_to_app</i></a>
                  

                    <i class="close medium material-icons">close</i>
                    </div>
                </div>
                <div id="lista_amigos" class="lista-amigo">
                   

                </div>

             </div>

         </div>
         <!-- criar grupo -->
         
         <div id="id02" class="w3-modal">
                <div class="w3-modal-content w3-animate-top w3-card-4">
                    <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id02').style.display='none'"class="w3-button w3-display-topright">&times;</span>
                    <h2>Criar grupos</h2>
                    </header>
                    <div class="w3-container">
                    <form form method="post" action="validar_grupo.php" enctype="multipart/form-data">
                    <?php

                    while($info=mysqli_fetch_array($sql_info,MYSQLI_NUM)){
                    $info_resu=$info[0];
                    $_SESSION["de"]=$info_resu;
                    }
                    ?>
                    <h2>Faça grupos para compratilhar momentos com amigos</h2>
                    <p>Primeiro escolha um nome para ele</p>
                    <label>Nome do grupo</label>
                    <input name="nmgrupo" class="w3-input w3-border w3-animate-input" type="text" style="width:30%,text-aling:left">
                    <br>
                    <a class="texto">&#32;Escolha uma foto do grupo&#32;	&#32;	</a><input class="w3-center" name="arquivo" type="file" id="file">
                    <br><br>
                    <p>vc pode escolher mais quatro amigos para forma o grupo com vc<p>
                    <div class="w3-row-padding">
                        <div class="w3-half">
                            <label>ipg 1°</label>
                            <input name="um" class="w3-input w3-border" type="text" placeholder="primeiro">
                        </div>
                        <div class="w3-half">
                            <label>ipg 2°</label>
                            <input name="dois" class="w3-input w3-border" type="text" placeholder="segundo">
                        </div>
                        </div>
                        <br>
                        <div class="w3-row-padding">
                        <div class="w3-half">
                            <label>ipg 3°</label>
                            <input name="tres" class="w3-input w3-border" type="text" placeholder="terceiro">
                        </div>
                        <div class="w3-half">
                            <label>ipg 4°</label>
                            <input name="quatro" class="w3-input w3-border" type="text" placeholder="quarto">
                        </div>
                        </div>
                        <br>
                        <div class="w3-panel w3-pale-yellow w3-topbar w3-bottombar w3-border-yellow">
                        <p>Só poderá adicionar pessoas que você tem o codigo.</p>
                        </div>
                        <input type="submit" value="Enaviar" name="crgrupo" class="w3-button w3-aqua w3-houver-white w3-block" style="text-shadow:1px 1px 0 #444">
                        <br>
                    </form>

                    </div>
                
                </div>
                </div>
         <!-- enviar aquivos -->
         <div id="id03" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-card-4">
                        <header class="w3-container w3-blue"> 
                        <span onclick="document.getElementById('id03').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h2>Arquivos</h2>
                        </header>
                        <div id="container-arquivos" class="w3-container">
                    
                            <form method="post" action="validar_arquivo.php" enctype="multipart/form-data">
                                <div class="w3-container" id="arquivos-enviar">
                                <a class="texto">&#32;Escolha o arquivo que deseja enviar&#32;	&#32;	</a><input class="w3-center" name="arquivo" type="file" id="file">
                                <input type="submit" value="Enaviar"  class="w3-button w3-aqua w3-houver-white w3-block" style="text-shadow:1px 1px 0 #444">
                                <br>
                                </div>
                            </form>
                        </div>

                    
                        
                    
                    </div>
                    </div>
                    <!-- adicionar amigos -->
                    <div id="id04" class="w3-modal">
                <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id04').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2>Adicionar amigos</h2>
                </header>

                <?php
                $notify="SELECT*FROM tb_notify where cd_para='$info_resu'";
                
                $query_notify=mysqli_query($con,$notify);
                
                ?>

                <div class='container-modal-amigos' id='container-modal-amigos'>
                <?php
                while($noty=mysqli_fetch_array($query_notify,MYSQLI_ASSOC)){
                    $meu_nome="SELECT nm_usu from tb_usu where cd_usu=".$noty['cd_de']."";
                    $query_nome=mysqli_query($con,$meu_nome);
                    while($resu=mysqli_fetch_array($query_nome,MYSQLI_ASSOC)){
                        $peguei_nome=$resu['nm_usu'];
                    echo" <div class=' notifica w3-hover-amber '>    
                        <img src='".$noty['ds_img']."'>
                        <div class='nome_notifica'>
                        ".$peguei_nome." 
                        </div>
                        <div class='data_notifica'>";
                        if($noty['dt_data']==$data){
                            echo "".$noty['hr_hora']."";
                        }
                        else{
                            echo "".$noty['dt_data']."";
                        }
                    
                    echo"</div>
                    <br>
                 
                        <div class='notifica-message'>
                        ".$noty['ds_notify']."
                        
                        </div>
                        <form action='aceitar_recusar.php' method='post'>
                        <footer class='w3-bar w3-container '>
                        <input type='submit' name='aceitar' value='aceitar'  class='w3-bar-item w3-button w3-block w3-hover-aqua w3-white w3-border' style='width:50%'>
                        <input type='submit' name='resusar' value='recusar' class='w3-bar-item w3-button w3-block w3-hover-aqua w3-white w3-border' style='width:50%'>
                        </footer>
                        </form>
                        </div>
                         ";
                        $_SESSION['denoty']=$info_resu;
                        $_SESSION['paranoty']=$noty['cd_de'];
                        $_SESSION['notify']=$noty['cd_notify'];

                }
            }
                ?>
                        </div>
                
                        <form method="post" action="enviar_solicitacao.php" enctype="multipart/form-data">
                        <div class="w3-container" id="arquivos-enviar">
                        <input type="text" name="nome" class="w3-block" placeholder="digite o nome de quem deseja adicionar">
                        <input type="submit" value="Enaviar"  class="w3-button w3-aqua w3-houver-white w3-block" style="text-shadow:1px 1px 0 #444">
                        <br>
                        </div>
                        </form>
                    <br>
                    
                    </div>
        
            </div>
           
<!-- The Modal -->
<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-blue"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
   <h2>Header</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'London')">Carinhas</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Paris')">Pessoas</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Tokyo')">Sem conteudo</button>
  </div>

<div id="London" class="w3-container city">
   <h1>Carinhas</h1>
<button type="button" class="btn btn-sm">😁</button> <button type="button" class="btn btn-sm">😂</button>
<button type="button" class="btn btn-sm">😃</button> <button type="button" class="btn btn-sm">😄</button>
<button type="button" class="btn btn-sm">😅</button> <button type="button" class="btn btn-sm">😆</button>
<button type="button" class="btn btn-sm">😉</button> <button type="button" class="btn btn-sm">😊</button>
<button type="button" class="btn btn-sm">😋</button> <button type="button" class="btn btn-sm">😌</button>
<button type="button" class="btn btn-sm">😍</button> <button type="button" class="btn btn-sm">😏</button>
<button type="button" class="btn btn-sm">😒</button> <button type="button" class="btn btn-sm">😓</button>
<button type="button" class="btn btn-sm">😔</button> <button type="button" class="btn btn-sm">😖</button>
<button type="button" class="btn btn-sm">😘</button> <button type="button" class="btn btn-sm">😚</button>
<button type="button" class="btn btn-sm">😜</button> <button type="button" class="btn btn-sm">😝</button>
<button type="button" class="btn btn-sm">😞</button> <button type="button" class="btn btn-sm">😠</button>
<button type="button" class="btn btn-sm">😢</button> <button type="button" class="btn btn-sm">😤</button>
<button type="button" class="btn btn-sm">😥</button> <button type="button" class="btn btn-sm">😨</button>
<button type="button" class="btn btn-sm">😩</button> <button type="button" class="btn btn-sm">😪</button>
<button type="button" class="btn btn-sm">😫</button> <button type="button" class="btn btn-sm">😭</button>
<button type="button" class="btn btn-sm">😰</button> <button type="button" class="btn btn-sm">😱</button>
<button type="button" class="btn btn-sm">😲</button> <button type="button" class="btn btn-sm">😳</button>
<button type="button" class="btn btn-sm">😵</button> <button type="button" class="btn btn-sm">😷</button>
<button type="button" class="btn btn-sm">😸</button> <button type="button" class="btn btn-sm">😹</button>
<button type="button" class="btn btn-sm">😺</button> <button type="button" class="btn btn-sm">😻</button>
<button type="button" class="btn btn-sm">😼</button> <button type="button" class="btn btn-sm">😽</button>
<button type="button" class="btn btn-sm">😾</button> <button type="button" class="btn btn-sm">😿</button>
<button type="button" class="btn btn-sm">🙀</button> <button type="button" class="btn btn-sm">🙈</button>
<button type="button" class="btn btn-sm">🙉</button> <button type="button" class="btn btn-sm">🙊</button>
<button type="button" class="btn btn-sm">😎</button> <button type="button" class="btn btn-sm">💩</button>
<button type="button" class="btn btn-sm">😈</button> <button type="button" class="btn btn-sm">👿</button>
  </div>

  <div id="Paris" class="w3-container city">
   <h1>Pessoas</h1>
            <button type="button" class="btn btn-sm">🙅</button> <button type="button" class="btn btn-sm">🙆</button>
            <button type="button" class="btn btn-sm">🙇</button> <button type="button" class="btn btn-sm">🙋</button>
            <button type="button" class="btn btn-sm">🙌</button> <button type="button" class="btn btn-sm">🙍</button>
            <button type="button" class="btn btn-sm">🙎</button> <button type="button" class="btn btn-sm">👶</button>
            <button type="button" class="btn btn-sm">👧</button> <button type="button" class="btn btn-sm">🧒</button>
            <button type="button" class="btn btn-sm">👦</button> <button type="button" class="btn btn-sm">👩</button>
            <button type="button" class="btn btn-sm">🧑</button> <button type="button" class="btn btn-sm">👨</button>
            <button type="button" class="btn btn-sm">👵</button> <button type="button" class="btn btn-sm">🧓</button>
            <button type="button" class="btn btn-sm">👴</button> <button type="button" class="btn btn-sm">👲</button>
            <button type="button" class="btn btn-sm">👳‍♀️</button> <button type="button" class="btn btn-sm">👳‍♂️</button>
            <button type="button" class="btn btn-sm">🧕</button> <button type="button" class="btn btn-sm">🧔</button>
            <button type="button" class="btn btn-sm">👱‍♂️</button> <button type="button" class="btn btn-sm">👱‍♀️</button>
  </div>

  <div id="Tokyo" class="w3-container city">
   <h1>Sem conteudo</h1>
   
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Close</button>
  </div>
 </div>
</div>

</div>

<!-- modal -->


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
     $(".icones").click(function(){
    $(".content-modal").show();
    $(".hub").hide();

 });
 $(".close").click(function(){
    $(".content-modal").hide();
    $(".hub").show();
 });
</script>
<script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
<script>
  $(".btn-sm").click(function() 
{
    var emoji = $( this ).text();
    $('#conteudo').val($('#conteudo').val() + emoji);
}); 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php
$hora=date('H:i:s');
$data=date('d/m/y');

if ((isset($_POST['menssagem'] )) &&  $_post['menssagem'] =! null   ){
$msn=$_POST['menssagem'];
$sql="INSERT INTO `tb_msn`( `cd_para`, `cd_de`, `ds_msn`, `hr_hora`, `dt_data`) VALUES ('$id_para','$id_de','$msn','$hora','$data')";
mysqli_query($con,$sql)or die ("Erro ao tentar insirir menssagem");
echo"<script> window.location.href='hub_chat.php?id_info=$info_resu&id=$id_para&nome=$nome'</script>";
}



?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
     var elems = document.querySelectorAll('.fixed-action-btn');
     var instances = M.FloatingActionButton.init(elems, {
     direction: 'right',
     hoverEnabled: false
     });
 });

</script>