<?php
require_once './models/productoModels.php'; 
class Productos{

	private $productoModel;


	public function __construct(){
         $this->productoModel = new productoModels();

	}

	public function get_productos(){
        return  $this->productoModel->get_productos();
	}

	public function get_productoHigh(){
		return  $this->productoModel->get_productoHigh();
	}


	public function get_for_id($id){
		  return  $this->productoModel->get_for_id($id);
	}

	public function add_producto($value){
     
        return  $this->productoModel->add_producto($value);
	}

	public function delete_producto($id){
         
         return  $this->productoModel->delete_producto($id);
	}

	public function valor_numerico($value){
	  $productos =	$this->productoModel->get_productos();
	  $prod = [];
	  $i =0;
	  $table = '';
	  foreach($productos as $producto){
		$subtotal =  $producto['precio'] * $producto['stock'];
		$i++;
		if(intval($subtotal)<=intval($value['valor'])){
			$prod[]= $producto;
			if($i==5){
				 break;
			}
		}
	
	  }
	  if(count($prod)>0){
		$table.='<table>';
		
		$table.='<tr><th>Nombre del producto</th>';
		$table.='<th>Precio</th></tr>';
		
		foreach($prod as $pro){
			  $table.="<tr>";
			  $table.="<td>".$pro['nombre']."</td>";
			  $table.="<td>".$pro['precio']."</td>";
			  $table.="</tr>";
		  }
		  $table.='</table>';
	  }
	
		
		
		return  $table;
	}

	
}

?>