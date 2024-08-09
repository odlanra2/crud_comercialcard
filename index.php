<?php
require_once './controller/Productos.php'; 
$productos = new Productos();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD, Arnaldo </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

   <div class="container" style="margin-top:20px">

   
   <h2>CRUD <span style="color:purple">Comercial Card</span></h2>
     <a type="button" class="lightbox btn btn-primary" title="Ingresar producto"  data-type="iframe" href="modal.php">
     	Agregar producto
     </a> 

     <a type="button" class="lightbox btn btn-primary" title="Ingresar valor numerico"  data-type="iframe" href="modal2.php">
     	Ingresar valor numerico
     </a> 
    
   	 <table class="example" class="display table table-striped table-bordered" style="">
      <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Subtotal</th>
                <th>Acciones</th>
               
            </tr>
        </thead>
	     <tbody>
	     	<div class="pre-load"></div>
	     	 <?php 
         $i = 0;
         $total =0;
         foreach($productos->get_productos() as $producto){ 
                  
                  $fecha = new  DateTime($producto['fecha_creacion']);
                  $i++;
                  $subtotal =  $producto['precio'] * $producto['stock'];
                  $total +=  $subtotal;

	     	 ?>
				   <tr>
				      <td><?php  echo $i ?></td>
				      <td><?php  echo $producto['nombre'] ?></td>
				      <td><?php  echo $producto['descripcion'] ?></td>
				      <td><?php  echo number_format( (float)$producto['precio'], 2, ',', '.' ) ?></td>
				      <td><?php  echo $producto['stock'] ?></td>
              <td><?php  echo number_format( (float)$subtotal, 2, ',', '.' ) ?></td>
				    
				      <td>
				       <a  class="lightbox" title="Editar producto"  data-type="iframe" href="modal.php?id=<?php echo $producto['ID'] ?>">
                               <span class="icon-pencil"></span> 
                           </a>

                          <a class='delete' title="Eliminar producto"  style="margin-left:20px" href="productos_handle.php?id=<?php echo $producto['ID'] ?>&delete='eliminar'">
                               <span class="icon-bin"></span>
                           </a> 
                </td>
				  </tr>
			  <?php }?>
        
	    </tbody>
	  
	  </table> 

	  <footer>
        <?php 
        
        $high = @$productos->get_productoHigh()[0]; 
      
        ?>
         
      
       <h3 style="text-align:right">Total: <?php  echo  number_format( (float)$total, 2, ',', '.' ) ?></h3> 
       <?php if(!empty($high)){ ?>
       <h3 style="text-align:right">Producto de mayor valor: <?php  echo  number_format( (float)$high['precio'], 2, ',', '.' ) ?></h3>
       <?php } ?>
      <h4>Informacion sobre gatos:</h4>   
     <?php
          $info = json_decode(file_get_contents("https://meowfacts.herokuapp.com/?lang=esp"));
          $info2 = json_decode(file_get_contents("https://meowfacts.herokuapp.com/?lang=esp"));
         ?>
         <p><?php echo '1) '. @$info->data[0]; ?></p>
         <p><?php echo '2) '. @$info2->data[0]; ?></p>
         
         <?php
      ?>
  
       <p style="margin-top:20px">Sitio creado por Arnaldo Lameda<p>
     </footer>	
     
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