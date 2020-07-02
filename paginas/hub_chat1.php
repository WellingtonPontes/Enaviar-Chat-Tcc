<?php 
include('../config/conecta.php');
ini_set('default_charset', 'UTF-8');
session_start();
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !=True){
  header("location:../index.html");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/hub.css">
    <script type="text/javascript" src="../javascript/main.js"></script>
    <script type="text/javascript" href="../javascript/bootstrap.js"></script>

    <title>Document</title>
    <script>
    
    
    </script> 
</head>
<body>


    <div id="chat-container">
        <div id="search-controler">
        
            <input id="pesquisa" type="text" placeholder="search"/>

        </div>
        <div id="conversation-list">
    <?php
    $data=date('d/m/y');
        while($info=mysqli_fetch_array($sql_info,MYSQLI_NUM)){
            $info_resu=$info[0];
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
    </a> ";
            }
        }
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

    ?>       

            </div>

            <div id="new-menssage-container">
            <img onclick="document.getElementById('id02').style.display='block'" src="https://img.icons8.com/dotty/80/000000/group-task.png"/>
            <!-- <input  onclick="document.getElementById('id02').style.display='block'" type="button" value="+" class="w3-button w3-circle w3-black"> -->

                <div id="id02" class="w3-modal">
                <div class="w3-modal-content w3-animate-top w3-card-4">
                    <header class="w3-container w3-teal"> 
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
                            <label>1°</label>
                            <input name="um" class="w3-input w3-border" type="text" placeholder="primeiro">
                        </div>
                        <div class="w3-half">
                            <label>2°</label>
                            <input name="dois" class="w3-input w3-border" type="text" placeholder="segundo">
                        </div>
                        </div>
                        <br>
                        <div class="w3-row-padding">
                        <div class="w3-half">
                            <label>3°</label>
                            <input name="tres" class="w3-input w3-border" type="text" placeholder="terceiro">
                        </div>
                        <div class="w3-half">
                            <label>4°</label>
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
            
                <img onclick="document.getElementById('id04').style.display='block'" src="https://img.icons8.com/dotty/80/000000/group-foreground-selected.png"/>
            
            <div id="id04" class="w3-modal">
                <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('id04').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2>Adicionar amigos</h2>
                </header>

                <?php
                $notify="SELECT*FROM tb_notify where cd_para='$info_resu'";
                
                $query_notify=mysqli_query($con,$notify);
                
                ?>

                <div  id='container-modal-arquivos'>
                <?php
                while($noty=mysqli_fetch_array($query_notify,MYSQLI_ASSOC)){
                    $meu_nome="SELECT nm_usu from tb_usu where cd_usu=".$noty['cd_de']."";
                    $query_nome=mysqli_query($con,$meu_nome);
                    while($resu=mysqli_fetch_array($query_nome,MYSQLI_ASSOC)){
                        $peguei_nome=$resu['nm_usu'];
                    echo" <div class='conversation active w3-hover-amber '>    
                        <img src='".$noty['ds_img']."'>
                        <div class='title-text'>
                        ".$peguei_nome." 
                        </div>
                        <div class='created-date'>";
                        if($noty['dt_data']==$data){
                            echo "".$noty['hr_hora']."";
                        }
                        else{
                            echo "".$noty['dt_data']."";
                        }
                    
                    echo"</div>
                        <div class='conversation-message'>
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
                
            
                <img onclick="document.getElementById('id03').style.display='block'" src="https://img.icons8.com/wired/64/000000/symlink-file.png"/>
                <div>
                    <div id="id03" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-card-4">
                        <header class="w3-container w3-teal"> 
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
                </div>
            
                <!-- <input type="button" value="+" class="w3-btn w3-black"> -->
                
            
            </div>
    <?php

    if(isset($_GET['id'])){
        $_SESSION['para']=$_GET['id'];
        $_SESSION['de']=$_GET['id_info'];
    }

    $id_para=$_SESSION['para'];
    $id_de=$_SESSION['de'];

    ?>

            <div id="chat-title">
                <span><?php 
                if(isset ($_GET['nome'])){
                $_SESSION['nome']=$_GET['nome'];
                }
                $title=$_SESSION['nome'];
                echo $title; ?></span>
                <div class="mobile" >
                <img src="https://img.icons8.com/dotty/80/000000/menu.png"/>
                </div>
                <div class="botoes">
                <a href="sair.php"><img src="https://img.icons8.com/small/32/000000/exit.png"/></a>
                <a href="ajuda.php"><img class="sair" src="https://img.icons8.com/windows/32/000000/question-mark.png"/></a>
            <br>
                <input onclick="modoescuro()" class="w3-radio" type="radio" name="gender">
                
                <input onclick="modoclaro()" class="w3-radio" type="radio" name="gender" >
                
                </div>
                
                
            </div>
            
            <div id="chat-message-list">
        
                <!-- <div class="message-row you-message">
                    <div class="message-content">
                        <div class="message-text">oi parça</div>
                        <div class="message-time">apr 16</div>
                    </div>
                </div> -->
                <!-- <div class="message-row outher-message">
                    <div class="message-content">
                        <img  src="avatar.png">
                        <div class="message-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, dolore cum deserunt atque iusto soluta quos magni. Officia vitae quas nam eveniet. Pariatur, ad distinctio. Illum cumque laborum unde exercitationem!</div>
                        <div class="message-time">apr 16</div>
                    </div>
                </div> -->
                
            </div>
            <form action="hub_chat.php" method="post">
                <div id="chat-form">
                    <!-- <img onclick="document.getElementById('id01').style.display='block'" src="../img/emoji.png"/> -->
                    <img onclick="document.getElementById('id01').style.display='block'" src="https://img.icons8.com/dotty/80/000000/anime-emoji.png"/>
                    <textarea name="menssagem" id="conteudo" placeholder="escreva algo"></textarea>
                    <br>
                    <input type="submit" value="Enaviar" name="enviar" class="w3-btn w3-hover-aqua w3-white" style="text-shadow:1px 1px 0 #444">
                </div>
            </form>
 

    <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom">
    <header class="w3-container w3-blue"> 
    <span onclick="document.getElementById('id01').style.display='none'" 
    class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
    <h2>EMOJIS</h2>
    </header>

    <div class="w3-bar w3-border-bottom">
    <input type="button" value="Carinhas" class="tablink w3-bar-item w3-button"  onclick="openCity(event, 'London')">
    <input type="button" value="Pessoas" class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Paris')">
    <input type="button" value="não tem conteudo ainda" class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Tokyo')">
    </div>

    <div id="London" class="w3-container city">
    <h1>Carinhas</h1>
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
                    
                        <button type="button" class="btn btn-sm">🙈</button>
                        <button type="button" class="btn btn-sm">🙉</button>
                        <button type="button" class="btn btn-sm">🙊</button>
            
                        <button type="button" class="btn btn-sm">😎</button>
                        <button type="button" class="btn btn-sm">💩</button>
                        <button type="button" class="btn btn-sm">😈</button>
                        <button type="button" class="btn btn-sm">👿</button>
    </div>

    <div id="Paris" class="w3-container city">
    <h1>Pessoas</h1>
            <button type="button" class="btn btn-sm">🙅</button>
            <button type="button" class="btn btn-sm">🙆</button>
            <button type="button" class="btn btn-sm">🙇</button>
            <button type="button" class="btn btn-sm">🙋</button>
            <button type="button" class="btn btn-sm">🙌</button>
            <button type="button" class="btn btn-sm">🙍</button>
            <button type="button" class="btn btn-sm">🙎</button>
            <button type="button" class="btn btn-sm">👶</button>
            <button type="button" class="btn btn-sm">👧</button>
            <button type="button" class="btn btn-sm">🧒</button>
            <button type="button" class="btn btn-sm">👦</button>
            <button type="button" class="btn btn-sm">👩</button>
            <button type="button" class="btn btn-sm">🧑</button>
            <button type="button" class="btn btn-sm">👨</button>
            <button type="button" class="btn btn-sm">👵</button>
            <button type="button" class="btn btn-sm">🧓</button>
            <button type="button" class="btn btn-sm">👴</button>
            <button type="button" class="btn btn-sm">👲</button>
            <button type="button" class="btn btn-sm">👳‍♀️</button>
            <button type="button" class="btn btn-sm">👳‍♂️</button>
            <button type="button" class="btn btn-sm">🧕</button>
            <button type="button" class="btn btn-sm">🧔</button>
            <button type="button" class="btn btn-sm">👱‍♂️</button>
            <button type="button" class="btn btn-sm">👱‍♀️</button>
    </div>

    <div id="Tokyo" class="w3-container city">
    <h1>sem conteudo</h1>
    <p>sem conteudo.</p><br>
    </div>

    <div class="w3-container w3-light-grey w3-padding">
    <input type="button" value="close" class="w3-button w3-right w3-white w3-border" 
    onclick="document.getElementById('id01').style.display='none'">
    </div>
    </div>
    </div>

    </div>


    </div>
            


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
    
 <div class="pop-up" id="pop-up">
   
    <div class="pesquisa" >
    
        <input class="w3-input" type="text" placeholder="search"/>
        

    </div>
    <p class="x">X</p>
    <div class="lista-conversa">
        <?php
        $login_info=$_SESSION['usu'];
        $query="SELECT `cd_usu`, `nm_usu`, `ds_imagem` FROM `tb_usu`";
        $info_logado="SELECT cd_usu FROM tb_usu where nm_login='$login_info'";
        $sql_info=mysqli_query($con,$info_logado);
        $sql=mysqli_query($con,$query);
        $data=date('d/m/y');
        while($info=mysqli_fetch_array($sql_info,MYSQLI_NUM)){
            $info_resu=$info[0];
            $_SESSION["de"]=$info_resu;
        }
        while ($dados=mysqli_fetch_array($sql,MYSQLI_NUM)){
            $unicmsn="SELECT*FROM (SELECT cd_msn,cd_para,cd_de,ds_msn,hr_hora,dt_data FROM tb_msn WHERE (cd_de='$info_resu' and cd_para='$dados[0]') or (cd_de='$dados[0]' and cd_para= '$info_resu')
            order by cd_msn desc limit 1) sub order by cd_msn asc ";
            $queyunic=mysqli_query($con,$unicmsn);
        while($ln=mysqli_fetch_array($queyunic,MYSQLI_ASSOC)){
            echo "
            <a href='hub_chat.php?id_info=$info_resu&id=$dados[0]&nome=$dados[1]'>
            <div class='conversation active w3-hover-amber '>
            <img src='".$dados[2]."'>
            <div class='title-text'>
            ".$dados[1]."
            </div>
            <div class='created-data'>";
            if($ln['dt_data']==$data){
                echo "".$ln['hr_hora']."";
            }
            else{
                echo "".$ln['dt_data']."";
            }
            echo "
            </div>
            <div class='conversation-message'>
            ".$ln['ds_msn']."
            </div>
            </div>
            </a>";
            }
        }
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
    
            
        ?>
   
    

    </div>
    <div class="nova-conversa">
    <img onclick="document.getElementById('id02').style.display='block'" src="https://img.icons8.com/dotty/80/000000/group-task.png"/>
    <img onclick="document.getElementById('id04').style.display='block'" src="https://img.icons8.com/dotty/80/000000/group-foreground-selected.png"/>        
    <img onclick="document.getElementById('id03').style.display='block'" src="https://img.icons8.com/wired/64/000000/symlink-file.png"/>
    <div>


</div>
   
</body>
</html>

<?php
$hora=date('H:i:s');
$data=date('d/m/y');

if ((isset($_POST['menssagem'] )) &&  $_post['menssagem'] =! null   ){
$msn=$_POST['menssagem'];
$sql="INSERT INTO `tb_msn`( `cd_para`, `cd_de`, `ds_msn`, `hr_hora`, `dt_data`) VALUES ('$id_para','$id_de','$msn','$hora','$data')";
mysqli_query($con,$sql)or die ("Erro ao tentar insirir menssagem");
echo"<script> window.location.href='hub_chat.php'</script>";
}


?>
<script>

</script>
