<?php
define('servidor','localhost');
define('user','root');
define('senha','');
define('db','db_chattcc');


$con = mysqli_connect(servidor,user,senha,db) or die('Não foi possivel conectar');
date_default_timezone_set("America/Sao_Paulo");


?>