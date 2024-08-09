<?php  
 require_once './controller/Productos.php'; 
 $productos = new Productos();
 
?>

<!DOCTYPE html>
<html>
<head>
	
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
   <body >
        <div >
         <form>
         <div class="row form-group">
			      <div class="col-md-6">
				     <label for="exampleInputEmail1">Ingrese un valor</label>
			             <input type="number" name='valor'  class="form-control" id="exampleInputEmail1" require aria-describedby="emailHelp" placeholder="Valor numerico">
				  </div>
                  <input type="hidden" name='valor_numerico' >
			  </div>
              <button type="button" class="aceptar btn btn-primary" >Aceptar</button>
        </form>
        <div class="resultados">
             
        </div>

</div> 

<script
src="assets/js/jquery.min.js"></script>

<script src="assets/js/bootstrap.min.js" ></script>
<script
src="assets/js/datatables.min.js"></script>

<script
src="assets/js/custom.js"></script> 
</body>
</html>          