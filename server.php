
<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Si le fichier existe, on ne passe pas par le router
if ($url !== '/' && file_exists(__DIR__.'/public'.$url)) {
    return false;
}

// On modifie certaines variable pour ne pas avoir de problèmes par la suite
$_SERVER['SCRIPT_NAME'] = '/index.php';
// On inclue le fichier qui sert de point d'entré pour notre application
require_once __DIR__.'/public/index.php';

?>
