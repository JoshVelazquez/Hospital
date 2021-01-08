<div class="form-group">
    <label for="text">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ej. Juan"
        value="<?php echo $nombre ?>" />
</div>
<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input type="text" name="Apellido" id="Apellido" placeholder="Ej. Perez" class="form-control"
        value="<?php echo $apellido ?>" />
</div>
<div class="form-group">
    <label for="Email">Email</label>
    <input type="email" name="Email" id="Email" class="form-control" placeholder="Ej. JuanPerez@gmail.com"
        value="<?php echo $email ?>">
</div>
<div class="form-group">
    <label for="Especialidad">Especialidad</label>
    <input list="Especialidades" name="Especialidad" id="Especialidad" placeholder="Ej. Pediatra" class="form-control"
        value="<?php echo $especialidad ?>" />
    <datalist id="Especialidades">
        <option value="Medico General">
        <option value="Pediatra">
        <option value="Oftamólogo">
        <option value="Ginecólogo">
        <option value="Cardiólogo">
        <option value="Geriatra">
        <option value="Dermatólogo">
        <option value="Dentista">
    </datalist>
</div>
<div class="form-group">
    <label for="Cedula">Cedula</label>
    <input type="text" name="Cedula" id="Cedula" placeholder="Ej. asdxd12345" class="form-control"
        value="<?php echo $cedula ?>" />
</div>
<?php
if ($cirujano > 0) {
?>
<div class="form-check">
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="Cirujano" value="Cirujano" checked>Cirujano
    </label>
</div>
<?php
}
else {
?>
<div class="form-check">
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="Cirujano" value="Cirujano">Cirujano
    </label>
</div>
<?php
                            }
                        ?>
<br>
<button type="reset" class="btn btn-dark" name="limpiar">Limpiar</button>
<button type="submit" class="btn btn-dark" name="enviar">Enviar</button>