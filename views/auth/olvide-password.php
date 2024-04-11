<h1 class="nombre-pagina">Olvide Contraseña</h1>
<p class="descripcion-pagina">Reestablece tu contraseña escribiendo tu Email a continuación</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form action="/olvide" method="POST" class="formulario">

<div class="campo">
    <label for="email">EMail:</label>
    <input 
        type="email" 
        id="email" 
        name="email"
        placeholder="Tu Email"
        />
</div>

<input type="submit" value="Enviar Instrucciones" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Registrate</a>
</div>