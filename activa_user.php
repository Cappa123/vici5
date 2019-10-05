<?php

require_once("dbconnect_mysqli.php");
require_once('Conexion_Clues.php');




$contraActual = $_POST['actual'];
$nuevaContra = $_POST['nuevaC'];
$confirmaContra = $_POST['confirma'];
$user = $_POST['user'];

//$contraActual."-".$nuevaContra."-".$confirmaContra;

$valida_contrase="SELECT count(*) as respuesta FROM vicidial_users WHERE user='$user' and pass='$contraActual';";
$cambiarpass = mysqli_query($link,$valida_contrase);

while($row=mysqli_fetch_array($cambiarpass)){

      echo $respuesta = $row['respuesta'];

   if($respuesta == 1){
$fecha=date('Y-m-d', strtotime('+28 day'));
 $fecha1= $fecha;


$actualizarFecha ="UPDATE vicidial_users SET last_date='$fecha1', pass='$nuevaContra' where user='$user' ; ";

$nuevaContraClues=md5($nuevaContra);

$actualizafechaClues ="UPDATE tbl_usuario SET fechaExpiracion='$fecha1', contrasena='$nuevaContraClues' where usuario='$user';";

$activaFecha = mysqli_query($link,$actualizarFecha);

$activaFechaclues = mysqli_query($conexion,$actualizafechaClues);

echo "Se Restablecio Corectamente!!\n\n\nPreciona SUBMIT ⇩";
    

   }else if($repuesta== 0){

      echo"Error de Contraseña";


   }   


}
























?>