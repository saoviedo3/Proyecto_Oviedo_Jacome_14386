<?php
class marca{
	private $id;
	private $descripcion;
	private $pais;
	private $direccion;
	private $foto;
	private $con;
	
	function __construct($cn){
		$this->con = $cn;
	}
	
//*************************************** 1. METODO get_list() **************************************************

public function get_list(){
	$d_new = "new/0";
	$d_new_final = base64_encode($d_new);
	$html = '
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<style>
		.not-active { 
            pointer-events: none; 
            cursor: default; 
        } 
		</style>
		<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>
			<th colspan="8" class="text-center">Lista de Firmas con RUC</th>
			</tr>
				<tr>
					<th colspan="8" class="text-center">
						<a href="indexmarca.php?d=' . $d_new_final . '" class="btn btn-primary">
							<i class="fas fa-plus"></i> Nuevo
						</a>
					</th>
				</tr>
				<tr>
					<th>Nombres</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Cedula</th>
					<th>Ruc</th>
					<th colspan="3" class="text-center">Acciones</th>
				</tr>
			</thead>';
		/* $sql = "SELECT id, descripcion, pais, direccion FROM marca";   
	$res = $this->con->query($sql);
	// Sin codificar <td><a href="index.php?op=del&id=' . $row['id'] . '">Borrar</a></td>
	while($row = $res->fetch_assoc()){
		$d_del = "del/" . $row['id'];
		$d_del_final = base64_encode($d_del);
		$d_act = "act/" . $row['id'];
		$d_act_final = base64_encode($d_act);
		$d_det = "det/" . $row['id'];
		$d_det_final = base64_encode($d_det);					
		$html .= '
			<tr>
				<td>' . $row['descripcion'] . '</td>
				<td>' . $row['pais'] . '</td>
				<td>' . $row['direccion'] . '</td>
				<td>
						<a href="indexmarca.php?d=' . $d_del_final . '" class="btn btn-danger not-active">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=' . $d_act_final . '" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=' . $d_det_final . '" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>';
	} */
	$html .= '
			<tr>
				<td>Steven Alejandro</td>
				<td>Oviedo</td>
				<td>Buitron</td>
				<td>1725245262</td>
				<td>1725245262001</td>
				<td>
						<a href="indexmarca.php?d=" class="btn btn-danger">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>
			<tr>
				<td>Carol Dayanara</td>
				<td>Jacome</td>
				<td>Sanmartin</td>
				<td>1825856595</td>
				<td>1825856595001</td>
				<td>
						<a href="indexmarca.php?d=" class="btn btn-danger ">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>';
	$html .= '  
	</table>
	';
	
	return $html;
	
}

public function get_list1(){
	$d_new = "new/0";
	$d_new_final = base64_encode($d_new);
	$html = '
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<style>
		.not-active { 
            pointer-events: none; 
            cursor: default; 
        } 
		</style>
		<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>
			<th colspan="8" class="text-center">Lista de Firmas Documentales</th>
			</tr>
				<tr>
					<th colspan="8" class="text-center">
						<a href="indexmarca.php?d=' . $d_new_final . '" class="btn btn-primary">
							<i class="fas fa-plus"></i> Nuevo
						</a>
					</th>
				</tr>
				<tr>
					<th>Nombres</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Cedula</th>
					<th colspan="3" class="text-center">Acciones</th>
				</tr>
			</thead>';
		/* $sql = "SELECT id, descripcion, pais, direccion FROM marca";   
	$res = $this->con->query($sql);
	// Sin codificar <td><a href="index.php?op=del&id=' . $row['id'] . '">Borrar</a></td>
	while($row = $res->fetch_assoc()){
		$d_del = "del/" . $row['id'];
		$d_del_final = base64_encode($d_del);
		$d_act = "act/" . $row['id'];
		$d_act_final = base64_encode($d_act);
		$d_det = "det/" . $row['id'];
		$d_det_final = base64_encode($d_det);					
		$html .= '
			<tr>
				<td>' . $row['descripcion'] . '</td>
				<td>' . $row['pais'] . '</td>
				<td>' . $row['direccion'] . '</td>
				<td>
						<a href="indexmarca.php?d=' . $d_del_final . '" class="btn btn-danger not-active">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=' . $d_act_final . '" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=' . $d_det_final . '" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>';
	} */
	$html .= '
			<tr>
				<td>Steven Alejandro</td>
				<td>Oviedo</td>
				<td>Buitron</td>
				<td>1725245262</td>
				<td>
						<a href="indexmarca.php?d=" class="btn btn-danger">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>
			<tr>
				<td>Carol Dayanara</td>
				<td>Jacome</td>
				<td>Sanmartin</td>
				<td>1825856595</td>
				<td>
						<a href="indexmarca.php?d=" class="btn btn-danger ">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>';
	$html .= '  
	</table>
	';
	
	return $html;
	
}

public function get_list2(){
	$d_new = "new/0";
	$d_new_final = base64_encode($d_new);
	$html = '
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<style>
		.not-active { 
            pointer-events: none; 
            cursor: default; 
        } 
		</style>
		<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>
			<th colspan="8" class="text-center">Lista de Firmas Persona Juridica</th>
			</tr>
				<tr>
					<th colspan="8" class="text-center">
						<a href="indexmarca.php?d=' . $d_new_final . '" class="btn btn-primary">
							<i class="fas fa-plus"></i> Nuevo
						</a>
					</th>
				</tr>
				<tr>
					<th>Nombre Representante Legal</th>
					<th>Apellido</th>
					<th>Razon Social</th>
					<th>Cedula</th>
					<th>Ruc</th>
					<th colspan="3" class="text-center">Acciones</th>
				</tr>
			</thead>';
		/* $sql = "SELECT id, descripcion, pais, direccion FROM marca";   
	$res = $this->con->query($sql);
	// Sin codificar <td><a href="index.php?op=del&id=' . $row['id'] . '">Borrar</a></td>
	while($row = $res->fetch_assoc()){
		$d_del = "del/" . $row['id'];
		$d_del_final = base64_encode($d_del);
		$d_act = "act/" . $row['id'];
		$d_act_final = base64_encode($d_act);
		$d_det = "det/" . $row['id'];
		$d_det_final = base64_encode($d_det);					
		$html .= '
			<tr>
				<td>' . $row['descripcion'] . '</td>
				<td>' . $row['pais'] . '</td>
				<td>' . $row['direccion'] . '</td>
				<td>
						<a href="indexmarca.php?d=' . $d_del_final . '" class="btn btn-danger not-active">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=' . $d_act_final . '" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=' . $d_det_final . '" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>';
	} */
	$html .= '
			<tr>
				<td>Steven Alejandro</td>
				<td>Oviedo</td>
				<td>Productos S.A.</td>
				<td>1725245262</td>
				<td>1725245262001</td>
				<td>
						<a href="indexmarca.php?d=" class="btn btn-danger">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>
			<tr>
				<td>Carol Dayanara</td>
				<td>Jacome</td>
				<td>Coorporacion La Favorita</td>
				<td>1825856595</td>
				<td>1825856595001</td>
				<td>
						<a href="indexmarca.php?d=" class="btn btn-danger ">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="indexmarca.php?d=" class="btn btn-info">
							<i class="fas fa-info"></i>
						</a>
					</td>
			</tr>';
	$html .= '  
	</table>
	';
	
	return $html;
	
}

public function delete_marca($id){
	$sql = "DELETE FROM marca WHERE id=$id;";
		if($this->con->query($sql)){
		echo $this->_message_ok("ELIMINÓ");
	}else{
		echo $this->_message_error("eliminar");
	}	
}


public function get_form($id=NULL){
		
	if($id == NULL){
		$this->descripcion = NULL;
		$this->pais = NULL;
		$this->direccion = NULL;
		$this->foto = NULL;
				
		$flag = "enabled";
		$op = "new";
		
	}else{

		$sql = "SELECT * FROM marca WHERE id=$id;";
		$res = $this->con->query($sql);
		$row = $res->fetch_assoc();
		
		$num = $res->num_rows;
		if($num==0){
			$mensaje = "tratar de actualizar la marca con id= ".$id;
			echo $this->_message_error($mensaje);
		}else{   
		
		  // ***** TUPLA ENCONTRADA *****
			echo "<br>TUPLA <br>";
			echo "<pre>";
				print_r($row);
			echo "</pre>";
		
			$this->descripcion = $row['descripcion'];
			$this->pais = $row['pais'];
			$this->direccion = $row['direccion'];
			$this->foto = $row['foto'];
			
			$flag = "enabled";
			$op = "update";
		}
	}
	
	$html = '
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<form name="Form_vehiculo" method="POST" action="indexmarca.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="' . $id  . '">
			<input type="hidden" name="op" value="' . $op  . '">
			
			  <table border="1" align="center" class="table table-bordered table-striped">
			  <thead class="thead-dark">
			  <tr>
			  <th colspan="8" class="text-center">Ingresar Datos</th>
			  </tr>
			  </thead>
					<div class="form-group">
						<tr>
							<td>Descripcion:</td>
							<td><input type="text" size="6" name="descripcion" value="' . $this->descripcion . '" required class="form-control"></td>
						</tr>
					</div>
					<div class="form-group">
						<tr>
							<td>Pais:</td>
							<td><input type="text" size="15" name="pais" value="' . $this->pais . '" required class="form-control"></td>
						</tr>
					</div>
					<div class="form-group">
						<tr>
							<td>Direccion:</td>
							<td><input type="text" size="15" name="direccion" value="' . $this->direccion . '" required class="form-control"></td>
						</tr>
					</div>
					<div class="form-group">
						<tr>
							<td>Foto:</td>
							<td><input type="file" name="foto" ' . $flag . '></td>
						</tr>
					</div>
					<tr>
						<th colspan="2"><input type="submit" name="Guardar" value="GUARDAR" class="btn btn-primary"></th>
					</tr>												
				</table>
				<a href="index.php" class="btn btn-secondary">HOME</a>
				';
	return $html;
}


public function get_detail_marca($id){
	$sql = "SELECT id, descripcion, pais, direccion, foto FROM marca WHERE id=$id;";   

	$res = $this->con->query($sql);
	$row = $res->fetch_assoc();
	
	$num = $res->num_rows;

	if($num==0){
		$mensaje = "tratar de editar la marca con id= ".$id;
		echo $this->_message_error($mensaje);
	}else{ 

			$html = '
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
			<table border="1" align="center" class="table table-bordered table-striped">
			<thead class="thead-dark">
			<tr>
			<th colspan="8" class="text-center">Marca</th>
			</tr>
			</thead>
				<tr>
					<td>Nombre: </td>
					<td>'. $row['descripcion'] .'</td>
				</tr>
				<tr>
					<td>Pais: </td>
					<td>'. $row['pais'] .'</td>
				</tr>
				<tr>
					<td>Direccion: </td>
					<td>'. $row['direccion'] .'</td>
				</tr>			
				<tr>
				<th colspan="2"><img src="' .PATH1 .'/' . $row['foto'] . '" width="300px"/></th>
				
					</tr>	
				<tr>
					<th colspan="2"><a href="index.php" class="btn btn-secondary">HOME</a>
					</th>
				</tr>																						
			</table>
			';
			

			return $html;
	}
}



public function save_marca(){
		
		
	$this->descripcion = $_POST['descripcion'];
	$this->pais = $_POST['pais'];
	$this->direccion = $_POST['direccion'];
	$this->foto = $_FILES['foto']['name'];
	 
			echo "<br> FILES <br>";
			echo "<pre>";
				print_r($_FILES);
			echo "</pre>";
	 
	
	$sql = "INSERT INTO marca VALUES(NULL,
										'$this->descripcion',
										'$this->pais',
										'$this->direccion',
										'$this->foto');";

	if($this->con->query($sql)){
		echo $this->_message_ok("guardó");
	}else{
		echo $this->_message_error("guardar");
	}								
									
}

	
public function update_marca(){
	$this->id = $_POST['id'];
	$this->descripcion = $_POST['descripcion'];
	$this->pais = $_POST['pais'];
	$this->direccion = $_POST['direccion'];
	$this->foto = $_FILES['foto']['name'];
		
	$sql = "UPDATE marca SET descripcion='$this->descripcion',
	pais='$this->pais',
	direccion='$this->direccion',
	foto='$this->foto'
	WHERE id=$this->id;";
		echo $sql;
		//exit;
		if($this->con->query($sql)){
			echo $this->_message_ok("modificó");
		}else{
			echo $this->_message_error("al modificar");
		}								
										
	}


//*********************** 3.3 METODO _get_name_File() **************************************************	
	
	private function _get_name_file($nombre_original, $tamanio){
		$tmp = explode(".",$nombre_original); //Divido el nombre por el punto y guardo en un arreglo
		$numElm = count($tmp); //cuento el número de elemetos del arreglo
		$ext = $tmp[$numElm-1]; //Extraer la última posición del arreglo.
		$cadena = "";
			for($i=1;$i<=$tamanio;$i++){
				$c = rand(65,122);
				if(($c >= 91) && ($c <=96)){
					$c = NULL;
					 $i--;
				 }else{
					$cadena .= chr($c);
				}
			}
		return $cadena . "." . $ext;
	}
	
	
//*************************************** PARTE I ************************************************************
	
	    
	 /*Aquí se agregó el parámetro:  $defecto*/
	private function _get_combo_db($tabla,$valor,$etiqueta,$nombre,$defecto){
		$html = '<select name="' . $nombre . '">';
		$sql = "SELECT $valor,$etiqueta FROM $tabla;";
		$res = $this->con->query($sql);
		while($row = $res->fetch_assoc()){
			//ImpResultQuery($row);
			$html .= ($defecto == $row[$valor])?'<option value="' . $row[$valor] . '" selected>' . $row[$etiqueta] . '</option>' . "\n" : '<option value="' . $row[$valor] . '">' . $row[$etiqueta] . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}
	
	/*Aquí se agregó el parámetro:  $defecto*/
	private function _get_combo_anio($nombre,$anio_inicial,$defecto){
		$html = '<select name="' . $nombre . '">';
		$anio_actual = date('Y');
		for($i=$anio_inicial;$i<=$anio_actual;$i++){
			$html .= ($i == $defecto)? '<option value="' . $i . '" selected>' . $i . '</option>' . "\n":'<option value="' . $i . '">' . $i . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}
	
	private function _get_radio($arreglo,$nombre,$defecto){
		
		$html = '
		<table border=0 align="left">';
				
		foreach($arreglo as $etiqueta){
			$html .= '
			<tr>
				<td>' . $etiqueta . '</td>
				<td>';
				
				if($defecto == NULL){
					$html .= '<input type="radio" value="' . $etiqueta . '" name="' . $nombre . '" checked/></td>';
				
				}else{
					$html .= ($defecto == $etiqueta)? '<input type="radio" value="' . $etiqueta . '" name="' . $nombre . '" checked/></td>' : '<input type="radio" value="' . $etiqueta . '" name="' . $nombre . '"/></td>';
				}
			
			$html .= '</tr>';
		}
		$html .= '
		</table>';
		return $html;
	}
	
	
//************************************* PARTE II ****************************************************	




//*************************************************************************	
	
	private function _message_error($tipo){
		$html = '
		<table border="0" align="center">
			<tr>
				<th>Error al ' . $tipo . '. Favor contactar a .................... </th>
			</tr>
			<tr>
				<th><a href="index.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}
	
	
	private function _message_ok($tipo){
		$html = '
		<table border="0" align="center">
			<tr>
				<th>El registro se  ' . $tipo . ' correctamente</th>
			</tr>
			<tr>
				<th><a href="index.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}
	
//****************************************************************************	
	
} // FIN SCRPIT
?>

