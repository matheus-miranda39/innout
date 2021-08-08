<?php
date_default_timezone_set('America/São_Paulo');
setLocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//constantes gerais
define('DAILY_TIME', 60 * 60 * 8); //oito horas em segundos (28800)

//pastas
//Variaveis com final '_PATH' guardam o caminho na máquina onde o projeto está localizado
define('MODEL_PATH', realpath(dirname(__FILE__). '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__). '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__). '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__). '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__). '/../exceptions'));

//arquivos
require_once(realpath(dirname(__FILE__). '/database.php'));
require_once(realpath(dirname(__FILE__). '/loader.php'));
require_once(realpath(dirname(__FILE__). '/session.php'));
require_once(realpath(dirname(__FILE__). '/date_utils.php'));
require_once(realpath(MODEL_PATH . '/Model.php'));
require_once(realpath(MODEL_PATH . '/User.php'));
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
require_once(realpath(EXCEPTION_PATH . '/ValidationException.php'));