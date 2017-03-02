<?php
    //Conectamos con la BD y guardamos el array de registros de palabras.
 $ar = array();
    $mysql = new mysqli("localhost", "root", "root114","harakiri");
    if($mysql->connect_error){
        die("Problemas con la conexion a la base de datos.");
    }
    $registros = $mysql->query("select * from palabras")or die($mysql->error);
 
    foreach ($registros as $value) {
        $json = array(
            'id' => $value['id'],
            'inicial' => $value['inicial'],
            'palabra' => $value['palabra'],
            'pista' => $value['pista']
            );
            array_push($ar, $json);
    }   
    echo  json_encode($ar);
     
?>