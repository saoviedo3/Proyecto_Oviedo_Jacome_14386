<?php
class vehiculo{
	private $id;
	private $IdUsuario;
	private $usuario;
	private $placa;
	private $marca;
	private $motor;
	private $chasis;
	private $combustible;
	private $anio;
	private $color;
	private $foto;
	private $avaluo;
	private $con;
	function __construct($cn){
		$this->con = $cn;
	}
	

	public function getHeader(){
		$html = '

		<head>
		<!-- Basic -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- Site Metas -->
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Matriculacion Vehicular</title>

		<!-- slider stylesheet -->
		<link rel="stylesheet" type="text/css"
			href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

		<!-- fonts style -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="../css/style.css" rel="stylesheet" />
		<!-- responsive style -->
		<link href="../css/responsive.css" rel="stylesheet" />
		</head>

		<!-- header section strats -->
		<header class="header_section">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg custom_nav-container ">
			<a class="navbar-brand" href="../login/cerrar.php">
				<span>
				JOVSA FIRMAS
				</span>
			</a>
			
			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="d-flex flex-column flex-lg-row align-items-end ml-auto">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="../login/cerrar.php">
								<span class="fas fa-home text-white"></span> Cerrar Sesion
							</a>
						</li>
					</ul>
				</div>
			</div>
			</nav>
		</div>
		</header>
			';
			return $html;
		}

	
public function update_vehiculo(){
	$this->id = $_POST['id'];
	$this->placa = $_POST['placa'];
	$this->motor = $_POST['motor'];
	$this->chasis = $_POST['chasis'];
	$this->marca = $_POST['marcaCMB'];
	$this->anio = $_POST['anio'];
	$this->color = $_POST['colorCMB'];
	$this->combustible = $_POST['combustibleRBT'];
	$this->avaluo = $_POST['avaluo'];
	$this->foto = $_FILES['foto']['name'];
		
	$sql = "UPDATE vehiculo SET 
	placa='$this->placa',
	marca='$this->marca',
	motor='$this->motor',
	chasis='$this->chasis',
	combustible='$this->combustible',
	anio='$this->anio',
	color='$this->color',
	foto='$this->foto',
	avaluo='$this->avaluo'
	WHERE id=$this->id;";
		//echo $sql;
		//exit;
		if($this->con->query($sql)){
			echo $this->_message_ok("modificó");
		}else{
			echo $this->_message_error("al modificar");
		}								
										
	}
	
	public function save_vehiculo(){
		
		$this->placa = $_POST['placa'];
		$this->usuario = $_POST['placa'];
		$this->motor = $_POST['motor'];
		$this->chasis = $_POST['chasis'];
		$this->avaluo = $_POST['avaluo'];
		$this->marca = $_POST['marcaCMB'];
		$this->anio = $_POST['anio'];
		$this->color = $_POST['colorCMB'];
		$this->combustible = $_POST['combustibleRBT'];
		$this->foto = $_FILES['foto']['name'];
		$clave = "123";
		
		$sqlu = "INSERT INTO usuarios VALUES(NULL, '$this->usuario', '$clave');";
		if ($this->con->query($sqlu)) {
			$idUsuarioInsertado = $this->con->insert_id; 
			echo $this->_message_ok("guardó");

			$sqlv = "INSERT INTO vehiculo VALUES(NULL,
												'$idUsuarioInsertado',
												'$this->placa',
												$this->marca,
												'$this->motor',
												'$this->chasis',
												'$this->combustible',
												'$this->anio',
												$this->color,
												'$this->foto',
												$this->avaluo);";

			if ($this->con->query($sqlv)) {
				echo $this->_message_ok("guardó el vehículo");
			} else {
				echo $this->_message_error("guardar el vehículo");
			}
		} else {
			echo $this->_message_error("guardar el usuario");
		}								
	}

	
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
	
	public function get_form($id=NULL){
		
		if($id == NULL){
			$this->IdUsuario = NULL;
			$this->placa = NULL;
			$this->marca = NULL;
			$this->motor = NULL;
			$this->chasis = NULL;
			$this->combustible = NULL;
			$this->anio = NULL;
			$this->color = NULL;
			$this->foto = NULL;
			$this->avaluo =NULL;
			
			$flag = "enabled";
			$op = "new";
			
		}else{

			$sql = "SELECT * FROM vehiculo WHERE id=$id;";
			$res = $this->con->query($sql);
			$row = $res->fetch_assoc();
			
			$num = $res->num_rows;
            if($num==0){
                $mensaje = "tratar de actualizar el vehiculo con id= ".$id;
                echo $this->_message_error($mensaje);
            }else{   
			
				echo "<br>TUPLA <br>";
				echo "<pre>";
					print_r($row);
				echo "</pre>";
				
				$this->IdUsuario = $row['IdUsuario'];
				$this->placa = $row['placa'];
				$this->marca = $row['marca'];
				$this->motor = $row['motor'];
				$this->chasis = $row['chasis'];
				$this->combustible = $row['combustible'];
				$this->anio = $row['anio'];
				$this->color = $row['color'];
				$this->foto = $row['foto'];
				$this->avaluo = $row['avaluo'];
				$flag = "enabled";
				$op = "update";
			}
		}
		
		
		$combustibles = ["Gasolina",
						 "Diesel",
						 "Eléctrico"
						 ];
		$html = '
				<form name="vehiculo" method="POST" action="indexvehiculo.php" enctype="multipart/form-data">
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		            <form name="Form_vehiculo" method="POST" action="indexvehiculo.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="' . $id  . '">
				<input type="hidden" name="op" value="' . $op  . '">
				
		  		<table border="1" align="center" class="table table-bordered table-striped">
				  <thead class="thead-dark">
				  <tr>
				  <th colspan="8" class="text-center">Datos del Vehiculo</th>
				  </tr>
				  </thead>
					
							<tr>
								<td>Placa:</td>
								<td><input type="text" size="6" name="placa" value="' . $this->placa . '" ' . ($op == "update" ? 'readonly' : '') . ' required class="form-control"></td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Marca:</td>
								<td>' . $this->_get_combo_db("marca","id","descripcion","marcaCMB",$this->marca) . '</td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Motor:</td>
								<td><input type="text" size="15" name="motor" value="' . $this->motor . '" required class="form-control"></td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Chasis:</td>
								<td><input type="text" size="15" name="chasis" value="' . $this->chasis . '" required class="form-control"></td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Combustible:</td>
								<td>' . $this->_get_radio($combustibles, "combustibleRBT",$this->combustible) . '</td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Año:</td>
								<td>' . $this->_get_combo_anio("anio",1980,$this->anio) . '</td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Color:</td>
								<td>' . $this->_get_combo_db("color","id","descripcion","colorCMB",$this->color) . '</td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Foto:</td>
								<td><input type="file" name="foto" ' . $flag . '></td>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<td>Avalúo:</td>
								<td><input type="text" size="8" name="avaluo" value="' . $this->avaluo . '" ' . $flag . ' required class="form-control"></td>
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
	
	

	public function get_list(){
		$d_new = "new/0";
		$d_new_final = base64_encode($d_new);
		$puedeEliminar = "disabled";
		$html = '
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
			<style>
			.desactivar { 
				pointer-events: none; 
				cursor: default; 
			} 
			</style>
			<table class="table table-bordered table-striped">
			<thead class="thead-dark">
                <tr>
                <th colspan="9" class="text-center">Lista de Firmas Documentales</th>
                </tr>
					<tr>
						<th colspan="9" class="text-center">
							<a href="indexvehiculo.php?d=' . $d_new_final . '" class="btn btn-primary">
								<i class="fas fa-plus"></i> Nuevo
							</a>
						</th>
					</tr>
					<tr>
						<th>Usuario</th>
						<th>Placa</th>
						<th>Marca</th>
						<th>Color</th>
						<th>Año</th>
						<th>Avalúo</th>
						<th colspan="3" class="text-center">Acciones</th>
					</tr>
				</thead>';
				$sql = "SELECT v.id, u.usuario, v.placa, m.descripcion as marca, col.descripcion as color, v.anio, v.avaluo  
				FROM vehiculo v
				JOIN usuarios u ON v.IdUsuario = u.IdUsuario
				JOIN color col ON v.color = col.id
				JOIN marca m ON v.marca = m.id;";
			
		$res = $this->con->query($sql);
		while($row = $res->fetch_assoc()){
			$d_del = "del/" . $row['id'];
			$d_del_final = base64_encode($d_del);
			$d_act = "act/" . $row['id'];
			$d_act_final = base64_encode($d_act);
			$d_det = "det/" . $row['id'];
			$d_det_final = base64_encode($d_det);				
			$html .= '
				<tr>
					<td>' . $row['usuario'] . '</td>
					<td>' . $row['placa'] . '</td>
					<td>' . $row['marca'] . '</td>
					<td>' . $row['color'] . '</td>
					<td>' . $row['anio'] . '</td>
					<td>' . $row['avaluo'] . '</td>
					<td>
                    <a href="indexvehiculo.php?d=' . $d_del_final . '" class="btn btn-danger desactivar">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
						<td>
							<a href="indexvehiculo.php?d=' . $d_act_final . '" class="btn btn-warning">
								<i class="fas fa-edit"></i>
							</a>
						</td>
						<td>
							<a href="indexvehiculo.php?d=' . $d_det_final . '" class="btn btn-info">
								<i class="fas fa-info"></i>
							</a>
						</td>
				</tr>';
		}
		$html .= '  
		</table>';
		
		return $html;
		
	}
	
	
	public function get_detail_vehiculo($id){
		$sql = "SELECT v.placa, u.usuario, m.descripcion as marca, v.motor, v.chasis, v.combustible, v.anio, c.descripcion as color, v.foto, v.avaluo  
				FROM vehiculo v, usuarios u, color c, marca m 
				WHERE v.id=$id AND v.marca=m.id AND v.IdUsuario=u.IdUsuario AND v.color=c.id;";
		$res = $this->con->query($sql);
		$row = $res->fetch_assoc();
		$num = $res->num_rows;

        if($num==0){
            $mensaje = "tratar de editar el vehiculo con id= ".$id;
            echo $this->_message_error($mensaje);
        }else{ 
				$html = '
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
				<table border="1" align="center" class="table table-bordered table-striped">
				<thead class="thead-dark">
                <tr>
                <th colspan="8" class="text-center">Datos del Vehiculo</th>
                </tr>
				</thead>
					<tr>
						<td>Usuario: </td>
						<td>'. $row['usuario'] .'</td>
					<tr>
						<td>Placa: </td>
						<td>'. $row['placa'] .'</td>
					</tr>
					<tr>
						<td>Marca: </td>
						<td>'. $row['marca'] .'</td>
					</tr>
					<tr>
						<td>Motor: </td>
						<td>'. $row['motor'] .'</td>
					</tr>
					<tr>
						<td>Chasis: </td>
						<td>'. $row['chasis'] .'</td>
					</tr>
					<tr>
						<td>Combustible: </td>
						<td>'. $row['combustible'] .'</td>
					</tr>
					<tr>
						<td>Anio: </td>
						<td>'. $row['anio'] .'</td>
					</tr>
					<tr>
						<td>Color: </td>
						<td>'. $row['color'] .'</td>
					</tr>
					<tr>
						<td>Avalúo: </td>
						<th>$'. $row['avaluo'] .' USD</th>
					</tr>
					<tr>
						<td>Valor Matrícula: </td>
						<th>$'. $this->_calculo_matricula($row['avaluo']) .' USD</th>
					</tr>			
					<tr>
					<th colspan="2"><img src="' .PATH .'/' . $row['foto'] . '" width="300px"/></th>
					
						</tr>	
					<tr>
						<th colspan="2"><a href="index.php" class="btn btn-secondary">HOME</a>
						</th>
					</tr>																						
				</table>';
				

				return $html;
		}
	}
	
	
	public function delete_vehiculo($id) {
		$sql_vehiculo = "DELETE FROM vehiculo WHERE id=$id;";
		$sql_usuario = "SELECT IdUsuario FROM vehiculo WHERE id=$id;";
	
		// Obtén el IdUsuario asociado al vehículo antes de eliminarlo
		$res = $this->con->query($sql_usuario);
		$row = $res->fetch_assoc();
		$idUsuario = $row['IdUsuario'];	
	
		// Intenta eliminar el vehículo y el usuario
		if ($this->con->query($sql_vehiculo) && $this->con->query("DELETE FROM usuarios WHERE IdUsuario=$idUsuario;")) {
			echo $this->_message_ok("ELIMINÓ");
		} else {
			echo $this->_message_error("eliminar");
		}
	}
	
	private function _calculo_matricula($avaluo){
		return number_format(($avaluo * 0.10),2);
	}
		
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
	
} 
?>

