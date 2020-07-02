<?php
include("../config/conecta.php");
session_start();
$de=$_SESSION['de'];
$para=$_SESSION['para'];
$data=date('d/m/y');

               
                // $slq="SELECT * FROM `tb_msn` WHERE cd_de ='$de' AND cd_para ='$para' OR ( cd_de ='$para' AND cd_para ='$de') LIMIT 0 , 30";
                // $slq="SELECT*FROM (SELECT * FROM tb_msn WHERE (cd_de='$de' and cd_para='$para') or (cd_de='$para' and cd_para= '$de')
                // order by cd_msn,hr_hora,dt_data desc ) sub order by cd_msn,hr_hora,dt_data   asc  ";
                $slq="SELECT*FROM (SELECT cd_msn,cd_para,cd_de,ds_msn,hr_hora,dt_data,ds_arquivo,nm_arquivo FROM tb_msn WHERE (cd_de='$de' and cd_para='$para') or (cd_de='$para' and cd_para= '$de')
                order by cd_msn desc ) sub order by cd_msn desc";
                $nome_de="SELECT ds_imagem FROM `tb_usu` WHERE cd_usu=$de";
                $nome_para="SELECT ds_imagem FROM `tb_usu` WHERE cd_usu=$para";
                $resul_de=mysqli_query($con,$nome_de);
                $resul_para=mysqli_query($con,$nome_para);
                while($pegar=mysqli_fetch_array($resul_de,MYSQLI_NUM)){
                    $reu_de=$pegar[0];
                }
                while($pegar=mysqli_fetch_array($resul_para,MYSQLI_NUM)){
                    $reu_para=$pegar[0];
                }
            

                
                $result=mysqli_query($con,$slq);
                $conta=mysqli_num_rows($result);
                
                
              
                
                if($conta <= 0){
                    echo"<code>Então a conversa só começa quando vc manda um OI! </code>";
                }
            else{
                while($ln=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                if($ln['cd_de'] == $de and $ln['cd_para'] == $para )
                {
                    $msn=$ln['ds_msn'];
                    // echo"<br><div align='right' class='dados-chat'>
                    // <div class='conteudo'>
                    
                    // <div class='texto'>

                    //     <h4>".$reu_de."</h4>    
                    //      <p class='tamanho w3-border w3-round-xxlarge  w3-container w3-blue' style='color: #848484;'>".$ln['ds_msn']."</p>
                         
                    //      <p class='tamanho' >".$ln['hr_hora']."/&#32;&#32;&#32;&#32;&#32;&#32;".$ln['dt_data']."</p>
                    // </div>
                    // </div>
                    //      </div>";
                 echo "  
                    <div class='message-row you-message'>
                        <div class='message-content'>
                            <div class='message-text'>";
                            if($ln['ds_arquivo']!=null){
                            echo "<a href='".$ln['ds_arquivo']."' download><img src='https://img.icons8.com/ios/50/000000/send-file.png'/>
                                ".$ln['nm_arquivo']."</a>";
                            }
                            else{
                                echo "".$ln['ds_msn']."";
                            }
                echo "</div>
                                <div class='message-time'>";
                                if($ln['dt_data']==$data){
                                    echo "".$ln['hr_hora']."";
                                }
                                else{
                                    echo "".$ln['dt_data']."";
                                  }
                echo"</div>
                </div>
            </div>";
                   
                }

                elseif($ln['cd_de'] == $para and $ln['cd_para'] == $de )
                {
                    $msn=$ln['ds_msn'];
                    // echo"<br><div align='left' class='dados-chat'>
                    // <div class='conteudo'>
                    
                    // <div class='texto'>
                    // <h4>".$reu_para."</h4>
                    //      <p class='tamanho w3-border w3-round-xxlarge  w3-container outro' style='color: #848484;'>".$ln['ds_msn']."</p>
                         
                    //      <p class='tamanho' >".$ln['hr_hora']."&#32;&#32;&#32;&#32;&#32;&#32;".$ln['dt_data']."</p>
                    // </div>
                    // </div>
                    //      </div>";
                    echo "  
                    <div class='message-row outher-message-black'>
                        <div class='message-content'>
                        <img  src='".$reu_para."'>
                            <div class='message-text'>";
                            if($ln['ds_arquivo']!=null){
                                echo "<a href='".$ln['ds_arquivo']."' download><img src='https://img.icons8.com/ios/50/000000/send-file.png'/>
                                    ".$ln['nm_arquivo']."</a>";
                                }
                                else{
                                    echo "".$ln['ds_msn']."";
                                }
                    
                    echo"</div>
                                <div class='message-time'>";
                                if($ln['dt_data']==$data){
                                    echo "".$ln['hr_hora']."";
                                }
                                else{
                                    echo "".$ln['dt_data']."";
                                  }
                echo"</div>
                </div>
            </div>";
                //     echo"<div class='container'>
                //     <img src='".$reu_para."' alt='Avatar' >
                //     <p class='right'>".$ln['ds_msn']."</p><br>
                //     <span class='time-right'>".$ln['hr_hora']."/&#32;".$ln['dt_data']."</span>
                //   </div>
                //     ";

                }

                }
            }
        