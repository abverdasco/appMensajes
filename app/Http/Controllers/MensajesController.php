<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MensajesController extends Controller
{
    // Muestra la vista del chat
    public function mostrarMensajes() {
        
        return  view('templates/header').
                view('listadoMensajes').
                view('templates/footer');

    }

    // El usuario envía un mensaje por AJAX:
    public function enviarMensaje(Request $request) {
        
        // Obtenemos el mensaje recibido
        $texto = $request->get('mensajeEnvio');
        
        // Creamos una variable vacía de tipo Mensaje
        $mensaje = new Mensaje();

        if ( strrpos($texto, '.jpg') == true || strrpos($texto, '.jpeg') == true || strrpos($texto, '.png') == true || strrpos($texto, '.webp') == true || strrpos($texto, '.bmp') == true ) {
            $mensaje->imagen = $texto;
        } elseif ( strrpos($texto, '.mp4') == true || strrpos($texto, '.mov') == true || strrpos($texto, '.wmv') == true || strrpos($texto, '.avi') == true || strrpos($texto, 'youtube') == true ) {
            $mensaje->video = $texto;
        } elseif ( strrpos($texto, '.gif') == true ) {
            $mensaje->gif = $texto;
        } else {
            // Asignamos la variable para el campo texto
            $mensaje->texto = $texto;
        }

        $session = Session();
        $usuario = $session->get('nombre');

        // Asignamos la variable para el campo usuario
        $mensaje->usuario = $usuario;

        // Guardamos el registro en la base de datos
        $mensaje->save();

        echo 'Mensaje enviado y guardado';


    }

    public function obtenerMensajes(Request $request) {
        $ultimoID = $request->ultimoID;
        $mensajes = DB::select('SELECT * FROM mensajes WHERE id > '.$ultimoID);
        $mensajesJson = json_encode($mensajes);
        echo $mensajesJson;
    }
}
