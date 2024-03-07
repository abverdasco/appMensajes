<div id="cuerpo-acceso">
    <div class="cuerpo-interno">
        <h1 class="titulo">DAWChat</h1>
        <form action="{{ url('login') }}" method="post">
            @csrf
            <label for="nombre" style="color: darkblue">Nombre de usuario:</label>
            <br>
            <input type="text" name="nombre" style="width: 50%; height: 1.5rem;" placeholder="Escriba su usuario"/>
            <br>
            <input type="submit" value="Acceder" class="boton" />
        </form>

    </div>

</div>