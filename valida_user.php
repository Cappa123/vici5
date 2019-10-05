<?php

require_once("dbconnect_mysqli.php");


if (isset($_GET["user"]))						{$user=$_GET["user"];}
	elseif (isset($_POST["user"]))				{$user=$_POST["user"];}

if (isset($_GET["pass"]))						{$pass=$_GET["pass"];}
	elseif (isset($_POST["pass"]))				{$pass=$_POST["pass"];}

$valida_user1="SELECT COUNT(*) AS agente from vicidial_users where user='$user' ";

$valida1 = mysqli_query($link,$valida_user1);
while($rowValida1=mysqli_fetch_array($valida1)){//primer while

$valida1 =$rowValida1['agente'];
if($valida1 == 1 ){//primer if valida usuario


$validacontrasena="SELECT COUNT(*) as acti FROM vicidial_users WHERE user='$user' and active='Y' ";

$validaActivo = mysqli_query($link,$validacontrasena);

while($rowactivo1=mysqli_fetch_array($validaActivo)){

	$activo = $rowactivo1['acti'];


if($activo == 1){





$valida_user="SELECT count(*) as n  from vicidial_users where user='$user' and pass='$pass';";

//$valida_user="SELECT *  from vicidial_users b  LEFT JOIN vicidial_live_agents a  ON b.user = a.user  WHERE b.user='$user' and b.pass='$pass';";

$execResto = mysqli_query($link,$valida_user);


while($row=mysqli_fetch_array($execResto)){

 $n =$row['n'];


if($n == 0){

echo "1";

}else{
$valida_pass="SELECT count(*) as p  from vicidial_live_agents where user='$user';";  ///last_login_date
$execResto1 = mysqli_query($link,$valida_pass);

while($rowp=mysqli_fetch_array($execResto1)){


 $p =$rowp['p'];

if($p == 0){//valida fecha ultimo login 
 
 $fecha=date('Y-m-d');
 $fecha1= $fecha;

$valida_fecha="SELECT  count(*) as c, last_login_date  from vicidial_users where user='$user' and  last_date<= '$fecha1';";  ///last_login_date

$execResto2 = mysqli_query($link,$valida_fecha);

while($rowf=mysqli_fetch_array($execResto2)){

$c =$rowf['c'];


if($c > 0){


echo "3";

}else{

	echo"0";
}
}

}else{

	echo "7";
}//valida fecha ultimo login 

}
}
}
}else{

echo "6";

}
}

}else{

echo "5";

}//primer if valida usuario
}//primer while