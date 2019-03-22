<?PHP

$conex = mysqli_connect("localhost","avesousa","26390042","credenciales");
if($conex){
    $documento =$_POST['documento'];
    $query = 'SELECT * FROM recuperadores WHERE dni='.$documento;
    $hacer = $conex->query($query);
    if($hacer){
        if($results = $hacer->fetch_array()){
            if($results['estado'] == 0){
                echo $results['nombre']." ".$results['apellido'];
            }else{
                echo "dnirepetido";
            }    
        }
    } 
}
//Cambiar estados, si estas en el trabajo
?>