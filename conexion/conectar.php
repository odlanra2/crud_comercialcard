<?php

class conectar{
    private $conectar;
  
    private $ServidorDB = "localhost";	// Nombre del Servidor de Base de Datos.
    private	$BaseDatos  = "crud_app"; 	// Nombre de la base de datos.
    private $UsuarioDB  = "root"; 	// Nombre del usuario de la base de datos.
    private  $ClaveDB    = ""; 	 // Contraseña del usuario.
    
    private $error;
	 public function __construct(){
         $this->error = '';
	 }

	 public function conectarBD(){
            
             if(!$this->conectar = mysqli_connect($this->ServidorDB, $this->UsuarioDB, $this->ClaveDB, $this->BaseDatos)){
                $this->error="A ocurrido un error, no se pudo conectar a la base de datos. ".  $this->conectar->connect_error;
                return false;
             }
            
           
             mysqli_set_charset($this->conectar,'utf8');
           
             return  $this->conectar;
	 }

	 public function cerrarConexion(){

	     if($this->conectar){
	     	  return mysqli_close($this->conectar);
	     	   
	     }else{
	     	  return false;
	     }
	    

	 }
}
?>