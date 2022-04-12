<?php
    class Conexiondb{

        function crearconexion(){
            $host="localhost";
            $user="root";
            $pass="";
            $bbd="fao2018_bddweb";
            $mysqli=new mysqli($host,$user,$pass,$bbd);
            if($mysqli->connect_errno){
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

            }
            return $mysqli;
        }

    }
 
 
 ?>