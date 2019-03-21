<?PHP

$conex = mysqli_connect("localhost","avesousa","26390042","credenciales");
if($conex){
	$documento =$_POST['documento'];
	$query = "select * from recuperadores where dni=".$documento." and estado=0";
    $hacer = $conex->query($query);
    if($hacer){
        if($results = $hacer->fetch_array()){
            echo $results['nombre']." ".$results['apellido'];
        }
    }

}
?>