
function buscar(valor) {
    console.log(valor)
    $.ajax({ 
        url:'buscador.php', 
        type: 'post',
        data: {'documento':valor},
        success: function(response) { 
            $('#nombre').val(response);
            concatenar();
            console.log(response);
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
    var data = new FormData(document.getElementById("form"));
    $.ajax({
        url:'subir.php',
        type:'post',
        dataType: 'html',
        data: data,
        success: function(response){
            alert(response);
        },
        processData: false,
        contentType: false
    })
}

var pre = document.getElementById("previsualizador");
pre.onchange = function(e){
    leerArchivo(e.srcElement);
}

function leerArchivo(input){
    if(input.files && input.files[0]){
        var lector = new FileReader();
    
        lector.onload = function(e){
            var img = document.createElement('img');
            img.id = 'imagen_visualizada';
            img.src = e.target.result;
    
            var zona = document.getElementById('previsualizador');
            zona.appendChild(img);
        }
    
        lector.readAsDataURL(input.files[0]);
    }
}