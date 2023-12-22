<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Matriculas Vehículos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
	<?php
		require_once("constantes.php");
		include_once("class/class.vehiculo.php");
		include_once("class/class.marca.php");
		
		$cn = conectar();
		$v = new vehiculo($cn);
		$m = new marca($cn);

		echo $v->getHeader();

		echo '<div style="display: flex; justify-content: center; align-items: flex-start; margin-top: 20px;">';
		//echo 'Aqui se mostrara la tabla de Firmas';

		// Lista de vehículos
		echo '<div style="margin-right: 20px;">';
		echo $m->get_list1();
		echo '</div>';
		
		// Lista de marcas
		echo '<div>';
		echo $m->get_list();
		echo '</div>';
		
		echo '</div>'; 

		echo '<div style="display: flex; justify-content: center; align-items: flex-start; margin-top: 20px;">';
		echo '<div>';
		echo $m->get_list2();
		echo '</div>';

		
		
	//*******************************************************
		function conectar(){
			//echo "<br> CONEXION A LA BASE DE DATOS<br>";
			$c = new mysqli(SERVER,USER,PASS,BD);
			
			if($c->connect_errno) {
				die("Error de conexión: " . $c->mysqli_connect_errno() . ", " . $c->connect_error());
			}else{
				//echo "La conexión tuvo éxito .......<br><br>";
			}
			
			$c->set_charset("utf8");
			return $c;
		}
	//**********************************************************	

		
	?>	
</body>
</html>
