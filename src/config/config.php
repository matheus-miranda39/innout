<?php
date_default_timezone_set('America/São_Paulo');
setLocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//pastas
define('MODEL_PATH', realpath(dirname(__FILE__). '/../models'));

require_once(realpath(dirname(__FILE__). '/database.php'));