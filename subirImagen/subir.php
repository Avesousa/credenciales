<?PHP

$conex = mysqli_connect("localhost","avesousa","26390042","credenciales");

if(!$conex){
	echo "<h3>No se ha podido conectar con la base de datos</h3>";
} else {

	$documento =$_REQUEST['documento'];
	$nombre = $_REQUEST['nombre'];
	$nombreConca = $_REQUEST['nombreConca'];
	$imagen = $_FILES['imagen']['tmp_name'];
	$ruta = "imagenes/".$nombreConca.$documento.".jpg";
	move_uploaded_file($imagen,$ruta);
	$query = "insert into usuario values('".$documento."','".$nombre."','".$ruta."')";
	$resultado = $conex->query($query);
	echo "Se ha cargado correctamente";
	if($resultado){
		$sqlQ = "UPDATE recuperadores SET estado = '1' WHERE (dni='".$documento."')";
		$conex->query($sqlQ);
	}
}
?>