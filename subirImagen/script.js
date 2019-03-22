
function buscar(valor) {
    $.ajax({ 
        url:'buscador.php', 
        type: 'post',
        data: {'documento':valor},
        success: function(response) { 
            $('#nombreBandera').val(response);
            concatenar();
            botonDisabled();
        }
        }); 
}

function concatenar(){
    if(revisarNombre()){
        var e = document.getElementById("nombre");
        var h = "";
        for(var i = 0; i < e.value.length; i++){
            console.log(e.value.charAt(i));
            if(e.value.charAt(i) != " "){
                h = h+e.value.charAt(i);
            }
        }
        document.getElementById("nombreConca").value = h;
        botonDisabled();
    }

}

function revisarNombre(){
    if($('#nombreBandera').val() != "dnirepetido"){
        $('#nombre').val($('#nombreBandera').val());
        $('#boton').attr('disabled',false);
        $('#respuesta').html("");
        return true;
    }else if($('#nombreBandera').val() == null){
        $('#boton').attr('disabled',true);
        $('#respuesta').html("");
    }else{
        $('#respuesta').html("<p>El dni colocado, ya fue actualizada su foto");
        $('#boton').attr('disabled',true);
        return false;
    }
}

function subir(){
    var data = new FormData(document.getElementById("form"));
    $.ajax({
        url:'subir.php',
        dataType: 'html',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success:function(e){
            alert(e);
        }
    })
    //alert("Ya se ha cargado la información")
}

function inicial(){
    var divarchivo = document.getElementById('archivo');
    divarchivo.addEventListener('change',mostrarLaImagen,false);
    
}

function mostrarLaImagen(e){
    var archivo = e.target.files[0];
    var lector = new FileReader();
    lector.onload = function(ev){
        var imagen = document.getElementById('imagen_previsualizador');
        imagen.style.display = "block";
        imagen.src= ev.target.result;
    }
    lector.readAsDataURL(archivo);
}

function botonDisabled(){
    var d = document.getElementById("documento");
    var n = document.getElementById("nombre");
    if(d.value != "" && n.value != "" && d.value != " " && n.value != " "){
        $('#boton').attr("disabled",false);
    }else{
        $('#boton').attr("disabled",true);
    }
}

window.addEventListener('load',inicial,false);