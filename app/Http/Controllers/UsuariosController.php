<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{
    // Página de bienvenida, para escribir el login
    public function acceso() {

        $session = Session();

        // if($session->get('nombre') != null) {
        if($session->has('nombre') != null) {
         
            return  view('templates/header').
                    view('listadoMensajes').
                    view('templates/footer');
        } 

        return  view('templates/header').
                view('acceso').
                view('templates/footer');
        
    }

    public function registrarSesion(Request $request) {
        // Obtenemos el valor enviado por el formulario
        $nombre = $request->post('nombre');

        // Creamos un objeto de tipo sesión:
        $session = Session();
        $session->put('nombre', $nombre);
        $session->put('colorR', mt_rand(150, 255));
        $session->put('colorG', mt_rand(150, 255));
        $session->put('colorB', mt_rand(150, 255));
        
        return  view('templates/header').
                view('listadoMensajes').
                view('templates/footer');

    }

    public function cerrarSesion() {
        // Session::forget('nombre');
        Session::flush();

        // return $this->acceso();
        return redirect('/');
    }
}
