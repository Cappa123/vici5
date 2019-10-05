<?php


date_default_timezone_set('America/Mexico_City');
$hora_incio=date("Y-m-d H:i:s");


$usuario = "stein";
$contraseña = "stein123";
$servidor = "10.9.2.128";
$baseDatos = "CluesHSBC";
$conexion = mysqli_connect($servidor,$usuario,$contraseña) or die ("NO se a podido conectar al server ");
if(!$conexion){
die("Conexion fallo!". mysqli_connect_error());
}else{

	echo "Conexcion lista!!";
}


$db = mysqli_select_db($conexion,$baseDatos) or die("upps!! no se a podido conectar con la bd");











?>