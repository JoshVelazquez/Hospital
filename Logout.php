<?php

include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Config.inc.php';

ControlSesion :: cerrarSesion();
Redireccion :: redirigir(SERVIDOR);
