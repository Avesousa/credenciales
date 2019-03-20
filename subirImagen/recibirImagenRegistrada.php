<?PHP
$hostname_localhost ="localhost";
$database_localhost ="credenciales";
$username_localhost ="avesousa";
$password_localhost ="26390042";

$json['img']=array();

	//if(true){)
	if(isset($_POST["btn"])){
		
		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		
		$ruta="imagenes";
		$archivo=$_FILES['imagen']['tmp_name'];
		echo 'Archivo';
		echo '<br>';
		echo $archivo;
		$nombreArchivo=$_FILES['imagen']['name'];
		$documento=$_POST['documento'];
		$nombreImagen = $documento;
		echo 'Nombre Archivo';
		echo '<br>';
		echo $nombreArchivo;
		move_uploaded_file($archivo,$ruta."/".$nombreImagen);
		$ruta=$ruta."/".$nombreImagen;
		$nombre=$_POST['nombre'];
		
		echo '<br>';
		echo 'Documento: ';
		echo $documento;
		echo '<br>';
		echo 'Nombre: ';
		echo $nombre;
		echo '<br>';
		echo 'ruta :';
		echo $ruta;
		echo '<br>';
		echo 'Tipo Imagen: ';
		echo ($_FILES['imagen']['type']);
		echo '<br>';
		echo '<br>';
		echo "Imagen: <br><img src='$ruta'>";
		echo '<br>';
		echo '<br>';
		echo 'imagen en Bytes: ';
		echo '<br>';
		echo '<br>';
		//echo $bytesArchivo=file_get_contents($ruta);
		echo '<br>';
		
		$bytesArchivo=file_get_contents($ruta);
		$sql="INSERT INTO usuario(documento,nombre,imagen,ruta_imagen) VALUES (?,?,?,?,?)";
		$stm=$conexion->prepare($sql);
		echo "Hizo la conexion";
		$stm->bind_param('issss',$documento,$nombre,$bytesArchivo,$ruta);
		echo "Siguio el bind";
		if($stm->execute()){
			echo 'imagen Insertada Exitosamente ';
			$consulta="select * from usuario where documento='{$documento}'";
			$resultado=mysqli_query($conexion,$consulta);
			echo '<br>';
			while ($row=mysqli_fetch_array($resultado)){
				echo $row['documento'].' - '.$row['nombre'].'<br/>';
				array_push($json['img'],array('documento'=>$row['documento'],'nombre'=>$row['nombre'],'photo'=>base64_encode($row['nombre']),'ruta'=>$row['ruta_imagen']));
			}
			mysqli_close($conexion);
			
			echo '<br>';
			echo 'Objeto JSON 2';
			echo '<br>';
			echo json_encode($json);
		} else{
			echo "No se inserto una verga";
		}
	}
?>