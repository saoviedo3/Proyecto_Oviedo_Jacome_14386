<?php
class usuario{
	private $IdUsuario;
	private $usuario;
	private $clave;
	private $header;
	private $Usuario;
	private $con;
	
	function __construct($cn){
		$this->con = $cn;
	}

	private function header(){
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
			<a class="navbar-brand" href="../index.html">
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
							<a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php">Login</a>
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

		public function bienvenida_usuario(){

			$usuario = $_SESSION['usuario'];
			$sql = "SELECT IdUsuario, Usuario 
			FROM usuarios
			WHERE IdUsuario = '$usuario';";
			$res = $this->con->query($sql);
			$row = $res->fetch_assoc();
			
			$num = $res->num_rows;
            if($num==0){
                $mensaje = "tratar de enviar la consulta";
                echo $this->_message_error($mensaje);
            }else{   
				$this->IdUsuario = $row['IdUsuario'];
				$this->Usuario = $row['Usuario'];
			}
			
			if ($usuario == 1) {
				$html = "<script>alert('HOLA " . $this->Usuario . "');
                window.location.href = '../adm/index.php';
                </script>";
			} else {
				$html = "<script>alert('HOLA " . $this->Usuario . "');
                window.location.href = '../usuario/index.php';
                </script>";				
			}

		echo $html;
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
	

	public function get_login(){
		
		
		$sql = "SELECT IdUsuario, Usuario 
		FROM usuarios;";
			$res = $this->con->query($sql);
			$row = $res->fetch_assoc();
			
			$num = $res->num_rows;
            if($num==0){
                $mensaje = "tratar de enviar la consulta";
                echo $this->_message_error($mensaje);
            }else{   
			
				$this->IdUsuario = $row['IdUsuario'];
				$this->Usuario = $row['Usuario'];

			}
		

			$html = '
				' . $this->header() . '
				<div class="container">
					<div class="row justify-content-center mt-5">
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<h2 class="card-title text-center">Inicio de Sesión</h2>
									<form name="login" method="POST" action="validar.php" enctype="multipart/form-data">
										<div class="form-group">
											<label for="usuario">Usuario</label>
											' . $this->_get_combo_db("usuarios", "IdUsuario", "usuario", "usuario", $this->IdUsuario) . '
										</div>

										<div class="form-group">
											<label for="clave">Contraseña</label>
											<input type="password" class="form-control" id="clave" placeholder="&#128272; Contraseña" name="clave" value="123">
										</div>

										<div class="form-group d-flex justify-content-between">
											<button class="btn btn-primary" type="submit" name="LOGIN">Iniciar sesión</button>
											<a href="../index.html" class="btn btn-secondary">Cancelar</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			';

			// Puedes agregar estilos personalizados en línea o en un archivo CSS
			$html .= '
				<style>
					.card {
						box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
					}

					.card-title {
						color: #007bff;
					}

					.btn-secondary {
						background-color: #dc3545;
						border-color: #dc3545;
					}
				</style>
			';



		return $html;

	}

	public function validar_usuario(){

		echo "<br>PETICION POST <br>";
				echo "<pre>";
					print_r($_POST);
				echo "</pre>";

		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];   
		
		$sql = "SELECT * FROM usuarios WHERE IdUsuario = '$usuario' and clave = '$clave'";
			$res = $this->con->query($sql);
			$row = $res->fetch_assoc();
			
			$num = $res->num_rows;
            if($num>0){
                echo "<br>USUARIO  ENCONTRADO <br>";
            }else{   
			
				echo "<br>USUARIO NO ENCONTRADO <br>";
			}
	
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
	
//****************************************************************************	
	
} // FIN SCRPIT
?>

