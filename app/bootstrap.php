<?php
//Load librairies
require_once 'config/Config.php';

//Autoload Core Librairies
spl_autoload_register(function ($className) {
    require_once 'librairies/' . $className . '.php';
});
