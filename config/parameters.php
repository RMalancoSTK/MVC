<?php

// Constante URL
define("URL", Config::getURL());

// Clave de encriptación
define("SECRET_KEY", "MVC");


// Constante de la base de datos
define("HOST", "localhost");
define("DATABASE", "mvc");
define("USER", "root");
define("PASSWORD", "");
define("CHARSET", "utf8");
define("PORT", "8080");

// Constantes de controlador y método por defecto
define("DEFAULT_CONTROLLER", "home");
define("DEFAULT_METHOD", "dashboard");

// Constantes prefijos de header location (redirection)
define("LOCATION_PREFIX", "Location: ");

// Constantes de header location (redirection)
define("BASE_URL", Config::getBaseUrl());
define("LOCATION_DEFAULT", LOCATION_PREFIX . BASE_URL . DEFAULT_CONTROLLER . "/" . DEFAULT_METHOD);
define("LOCATION_LOGIN", LOCATION_PREFIX . BASE_URL . "login/ingresar");

// Constantes para los roles de la aplicación
define("ROL_ADMINISTRADOR", 1);
define("ROL_USUARIO", 2);
// Constantes para los estados de la aplicación
define("ESTADO_ACTIVO", 1);
define("ESTADO_INACTIVO", 0);
// Constantes para los estados de autenticación
define("AUTHENTICATED", true);
define("NOT_AUTHENTICATED", false);
