@php
    $session = Session();
    $nombre = $session->get('nombre');
@endphp

<div id="cuerpo-chat">
    <h1>Mensajes del chat. Bienvenido <i> {{ $nombre }} </i></h1>
    <a href="{{url('cerrarSesion')}}">
        <button class="boton">Cerrar Sesión</button>
    </a>
    <div id="contenedorMensajes">
        
    </div>

    <input type="text" id="textoUsuario" name="textoUsuario" class="barra" placeholder="Mensaje" />
    <button onclick="enviarMensaje()" class="boton">Enviar</button>
    <button onclick="mostrarMensajes()" class="boton">Actualizar mensajes</button>

</div>
