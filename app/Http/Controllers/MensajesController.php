<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensajesController extends Controller
{
    // Muestra la vista del chat
    public function mostrarMensajes() {
        
        return  view('templates/header').
                view('listadoMensajes').
                view('templates/footer');

    }

    // El usuario envía un mensaje por AJAX:
    public function enviarMensaje() {
        
    }
}
