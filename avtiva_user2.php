<?php

/*require_once("dbconnect_mysqli.php");
require_once('Conexion_Clues.php');
require_once('Conexion_vicidial.php');




$contraActual = $_POST['actual'];
$nuevaContra = $_POST['nuevaC'];
$confirmaContra = $_POST['confirma'];
$user = $_POST['user'];


//$contraActual."-".$nuevaContra."-".$confirmaContra;

$valida_contrase="SELECT count(*) as respuesta FROM vicidial_users WHERE user='$user' and pass='$contraActual';";
$cambiarpass = mysqli_query($link,$valida_contrase);

while($row=mysqli_fetch_array($cambiarpass)){

      $respuesta = $row['respuesta'];

   if($respuesta == 1){
$fecha=date('Y-m-d', strtotime('+28 day'));
 $fecha1= $fecha;


$actualizarFecha ="UPDATE vicidial_users SET last_date='$fecha1', pass='$nuevaContra' where user='$user' ; ";

$nuevaContraClues=md5($nuevaContra);

$actualizafechaClues ="UPDATE tbl_usuario SET fechaExpiracion='$fecha1', contrasena='$nuevaContraClues' where usuario='$user';";

$activaFecha = mysqli_query($link,$actualizarFecha);
$activaFecha5 = mysqli_query($conexion5,$actualizarFecha);

$activaFechaclues = mysqli_query($conexion,$actualizafechaClues);

echo "Se Restablecio Corectamente!!\n\n\nPresiona SUBMIT ⇩";
    

   }else if($repuesta== 0){

      echo"Error de Contraseña";


   }   


}*/



require_once("dbconnect_mysqli.php");
require_once('Conexion_Clues.php');
require_once('Conexion_vicidial.php');




$contraActual = $_POST['actual'];
$nuevaContra = $_POST['nuevaC'];
$confirmaContra = $_POST['confirma'];
$user = $_POST['user'];

//$contraActual."-".$nuevaContra."-".$confirmaContra;
$userClues ="SELECT * FROM tbl_usuario WHERE usuario='$user'";
$validauserClues = mysqli_query($conexion,$userClues);

$numero_fila = mysqli_num_rows($validauserClues);


if($numero_fila>0){
	//echo "hola";


$valida_contrase="SELECT * FROM vicidial_users WHERE user='$user';";
$cambiarpass = mysqli_query($link,$valida_contrase);
$numero_filas_vici = mysqli_num_rows($cambiarpass);

if($numero_filas_vici>0){

 $select_user="SELECT pass from vicidial_users where user='$user';";

$rpass = mysqli_query($link,$select_user);
while($row=mysqli_fetch_array($rpass)){

       $contrasena = $row['pass'];



   if(strcmp($contraActual,$contrasena) == 0){
   	//echo "hola";

$fecha=date('Y-m-d', strtotime('+28 day'));
 $fecha1= $fecha;


$actualizarFecha ="UPDATE vicidial_users SET last_date='$fecha1', pass='$nuevaContra' where user='$user' ; ";

$nuevaContraClues=md5($nuevaContra);

$actualizafechaClues ="UPDATE tbl_usuario SET fechaExpiracion='$fecha1', contrasena='$nuevaContraClues' where usuario='$user';";

$activaFecha = mysqli_query($link,$actualizarFecha);
//fecha en server 37 para sincronizar los usuarios
$activaFecha37 = mysqli_query($conexion37,$actualizarFecha);


$activaFechaclues = mysqli_query($conexion,$actualizafechaClues);

echo "Se Restablecio Corectamente!!\n\n\nPresiona SUBMIT ⇩";
    

   }else{

      echo"Contraseña Actual no coincide!!";


   }   


}//fin del while
}
}else{

echo "El usuario no esta registrado en Clues";

}






















?>