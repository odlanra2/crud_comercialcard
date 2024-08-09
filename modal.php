<?php  
 require_once './controller/Productos.php'; 
 if(isset($_GET['id'])){
 	  $id = $_GET['id'];
      $productos = new Productos();
      $producto = $productos->get_for_id($id);
 }
 
 
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
			<div class="pre-load"></div>
              
            <div class="container">
               <div class="row">
               <div  class="col-md-10">
              	<div class="row form-group">
			     <div class="col-md-6">
				    <label for="exampleInputEmail1">Nombre del producto</label>
				    <input type="text" name='nombre' value='<?php echo @$producto["nombre"]  ?>' class="form-control" id="exampleInputEmail1" require aria-describedby="emailHelp" placeholder="Nombre">
				  
				  </div>
				  <div class="col-md-6">
				      <label for="exampleInputPassword1">Descripcion</label>
			    <input type="text" name='descripcion' value= '<?php echo  @$producto["descripcion"] ?>' class="form-control" id="exampleInputPassword1" require  placeholder="Descripcion">
				  
				  </div>
				</div>  
			  <div class="row form-group">
			      <div class="col-md-6">
				     <label for="exampleInputEmail1">Precio:</label>
			    <input type="number" name='precio'  value= '<?php echo  @$producto["precio"] ?>' class="form-control" id="exampleInputEmail1" require aria-describedby="emailHelp" placeholder="Precio">
				  
				  </div>
				
			  </div>
			  <div class="row form-group">
			   <div class="col-md-6">
				    <label for="exampleInputPassword1">stock</label>
			       <input type="number" name='stock' value='<?php echo  @$producto["stock"] ?>' class="form-control" id="exampleInputPassword1" require placeholder="stock">
			   </div>
			  </div>
			  </div> 
		      </div>	
               <input type='hidden' name='id' value='<?php echo  @$producto["ID"]  ?>'/>
			 
			    <button type="button" class="guardar btn btn-primary" ><?php echo !isset($producto["ID"])? 'Guardar' : 'Actualizar'; ?></button>
                  
             </div> 	
           </form>

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