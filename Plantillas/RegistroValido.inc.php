<form action="Index.php" method="post">
    <div class="form-group">
        <label for="text">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ej. Juan" <?php $validador -> mostrarNombre()?>/>
        <?php
	        $validador -> mostrarErrorNombre();
	    ?>
    </div>
    <div class="form-group">
        <label for="Apellido">Apellido</label>
        <input type="text" name="Apellido" id="Apellido" placeholder="Ej. Perez" class="form-control" <?php $validador -> mostrarApellido()?>/>
        <?php
	        $validador -> mostrarErrorApellido();
	    ?>
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" name="Email" id="Email" class="form-control" placeholder="Ej. JuanPerez@gmail.com"<?php $validador -> mostrarEmail()?>>
        <?php
	        $validador -> mostrarErrorEmail();
	    ?>
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="Password" id="Password" class="form-control" placeholder="*******">
        <?php
	        $validador -> mostrarErrorPassword();
	    ?>
    </div>
    <button type="reset" class="btn btn-dark" name="limpiar">limpiar</button>
    <button type="submit" class="btn btn-dark" name="enviar">Enviar</button>
</form>