<?php
include("../config/conecta.php");
session_start();
$de=$_SESSION['de'];
$para=$_SESSION['para'];
$data=date('d/m/y');


               
                // $slq="SELECT * FROM `tb_msn` WHERE cd_de ='$de' AND cd_para ='$para' OR ( cd_de ='$para' AND cd_para ='$de') LIMIT 0 , 30";
                // $slq="SELECT*FROM (SELECT * FROM tb_msn WHERE (cd_de='$de' and cd_para='$para') or (cd_de='$para' and cd_para= '$de')
                // order by cd_msn,hr_hora,dt_data desc ) sub order by cd_msn,hr_hora,dt_data   asc  ";
                $slq="SELECT cd_msn_grupo,cd_grupo, ds_msn_grupo,cd_de_grupo,hr_hora,dt_hora,nm_qenviou FROM tb_grupo_msn WHERE cd_grupo='$para' order by cd_msn_grupo desc ";
                // $nome_de="SELECT ds_imagem FROM `tb_usu` WHERE cd_usu=$de";
                // $nome_para="SELECT ds_imagem FROM `tb_usu` WHERE cd_usu=$para";
                // $resul_de=mysqli_query($con,$nome_de);
                // $resul_para=mysqli_query($con,$nome_para);
                // while($pegar=mysqli_fetch_array($resul_de,MYSQLI_NUM)){
                //     $reu_de=$pegar[0];
                // }
                // while($pegar=mysqli_fetch_array($resul_para,MYSQLI_NUM)){
                //     $reu_para=$pegar[0];
                // }
            

                
                $result=mysqli_query($con,$slq);
                $conta=mysqli_num_rows($result);
                
                
              
                
                if($conta <= 0){
                    echo"<code>Então a conversa só começa quando vc manda um OI! </code>";
                }
            else{
                while($ln=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                if($ln['cd_de_grupo'] == $de and $ln['cd_grupo'] == $para )
                {
                
                    echo "  
                    <div class='sua-mensagem'>
                            <div class='texto-mensagem'>";
                            echo "".$ln['ds_msn_grupo']."";
                            // if($ln['ds_arquivo']!=null){
                            //     echo "<a href='".$ln['ds_arquivo']."' download><img src='https://img.icons8.com/ios/50/000000/send-file.png'/>
                            //     ".$ln['nm_arquivo']."</a>";

                            // }
                            // else{
                            //     echo "".$ln['ds_msn']."";
                            // }
                echo 
                    "</div>
                        <div class='hora-data'>";
                        if($ln['dt_hora']==$data){
                            echo "".$ln['hr_hora']."";
                        }
                        else{
                            echo "".$ln['dt_hora']."";
                                  }
                echo"
                </div>
            </div>";
                   
                }

                else
                {                 
                    echo "  
                    <div class='outra-mensagem'>
                    <span class='nome-grupo'>";
                    echo "".$ln['nm_qenviou']."";
                    echo " </span>
                            <div class='texto-mensagem'>";
                            echo "".$ln['ds_msn_grupo']."";
                            // if($ln['ds_arquivo']!=null){
                            //     echo "<a href='".$ln['ds_arquivo']."' download><img src='https://img.icons8.com/ios/50/000000/send-file.png'/>
                            //     ".$ln['nm_arquivo']."</a>";
                            // }
                            // else{
                            //     echo "".$ln['ds_msn']."";
                            // }
                    echo
                    "</div>
                    
                                <div class='outra-hora'>";
                                if($ln['dt_hora']==$data){
                                    echo "".$ln['hr_hora']."";
                                }
                                else{
                                    echo "".$ln['dt_hora']."";
                                  }
                echo"
                </div>
            </div>";
             
                }

                }
            }
        