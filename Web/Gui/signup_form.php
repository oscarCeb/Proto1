<?php
    require_once "../Scripts/rutas.php";
?>
<form method="post" action= <?php echo SCRIPT_PATH."signup_ops.php"; ?> >
    <input type="hidden" value="Ingresar" id="hidden">
    <div class="form-group">
        <label for="Usuario">Nombre de Usuario</label>
        <input type="text" onBlur="checkuser(this.value)" class="form-control" name = "username"  id="username" placeholder="Usuario">
        <div id="used"> </div>

    </div>
    <div class="form-group">
        <label for="Password">Contraseña</label>
        <input type="password" class="form-control" name = "password" id="password" placeholder="Contraseña">
    </div>
    <div class="form-group">
        <label for="ConfirmarPassword">Confirmar Contraseña</label>
        <input type="password" class="form-control" name = "confirmarPass" id="confirmarPass" placeholder="Confirmar Contraseña">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>