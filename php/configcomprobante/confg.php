<?php

//CONEXION A LA BASE DE DATOS-->

$host="localhost";
$base="debian2";
$usuario="root";
$contrasenia="";
$port=3307;

try 
{ 

 //$conexion=new PDO("mysql:host=$host;port=3307;dbname=$base",$usuario,$contrasenia);//con el puerto

$conexion=new PDO("mysql:host=$host;dbname=$base",$usuario,$contrasenia);

  
} 
catch (Exception $ex) 
{
    echo $ex->getMessage();//muestra msj si falla la coneccion
}

?>