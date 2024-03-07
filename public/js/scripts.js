var ultimoID = 0;

$( document ).ready(function() {
    mostrarMensajes();
});

function enviarMensaje() {
    var texto = $('#textoUsuario').val();
    
    $.ajax({
        url: baseUrl + '/enviarMensaje',
        method: 'get',
        data: { mensajeEnvio: texto },
        success: function(respuesta) {

            texto = '';
            mostrarMensajes();
        }
    });
    
}

function mostrarMensajes() {
    $.ajax({
        url: baseUrl + '/obtenerMensajes',
        method: 'get',
        data: {ultimoID:ultimoID},
        success: function(respuesta) {
            var mensajes = JSON.parse(respuesta);

            for (let i = 0; i < mensajes.length; i++) {
                if (mensajes[i]['imagen'] !== "") {
                    if (mensajes[i]['usuario'] == usuario) {
                        $('#contenedorMensajes').append('<div class="mensaje propio" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b><img src="' + mensajes[i]['imagen'] + '" class="recurso img" /><i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    } else {
                        $('#contenedorMensajes').append('<div class="mensaje" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b><img src="' + mensajes[i]['imagen'] + '" class="recurso img" /><i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    }
                } else if(mensajes[i]['video'] !== "") {
                    if (mensajes[i]['usuario'] == usuario) {
                        $('#contenedorMensajes').append('<div class="mensaje propio" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b><iframe width="560" height="315" src="' + mensajes[i]['video'] + '" class="recurso vid" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    } else {
                        $('#contenedorMensajes').append('<div class="mensaje" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b><iframe width="560" height="315" src="' + mensajes[i]['video'] + '" class="recurso vid" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    }
                } else if(mensajes[i]['gif'] !== "") {
                    if (mensajes[i]['usuario'] == usuario) {
                        $('#contenedorMensajes').append('<div class="mensaje propio" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b><img src="' + mensajes[i]['gif'] + '" class="recurso gif" /><i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    } else {
                        $('#contenedorMensajes').append('<div class="mensaje" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b><img src="' + mensajes[i]['gif'] + '" class="recurso gif" /><i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    }
                } else {
                    if (mensajes[i]['usuario'] == usuario) {
                        $('#contenedorMensajes').append('<div class="mensaje propio" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b>' + mensajes[i]['texto'] + ' <i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    } else {
                        $('#contenedorMensajes').append('<div class="mensaje" style="background-color: rgb('+ colorR + ', ' + colorG + ', ' + colorB +')"><b>' + mensajes[i]['usuario'] + ': </b>' + mensajes[i]['texto'] + ' <i class="hora">' + mensajes[i]['created_at'] + '</i></div>');
                    }
                }

                ultimoID = mensajes[i]['id'];
                scroll(0, 1000000);
            }
        }
    });
}

setInterval(() => {
    mostrarMensajes();
}, 5000);
