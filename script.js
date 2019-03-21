
function buscar(valor) {
    $.ajax({ 
        url:'buscador.php', 
        type: 'post',
        data: {"documento":valor},
        success: function(response) { 
            $('#nombre').val(response);
            concatenar();
        }
        }); 
}

function concatenar(){
    var e = document.getElementById("nombre");
    var h = "";
    for(var i = 0; i < e.value.length; i++){
        console.log(e.value.charAt(i));
        if(e.value.charAt(i) != " "){
            h = h+e.value.charAt(i);
        }
    }
    document.getElementById("nombreConca").value = h;
    console.log(h);

}

function subir(){
    var formulario = document.getElementById("form");
    var data = new FormData(formulario);

    $.ajax({
        url:'subir.php',
        type:'post',
        data: data,
        success: function(response){
            $('#cargador').val(response);
        }

    })
}
