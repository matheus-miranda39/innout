<?php
// função para simplificar a chamada do caminho antes era: require_once(nomeDaPasta_PATH . '/nomeDoArquivo.php');
function loadModel($modelName) {
    require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadView($viewName, $params = array()) {

    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value; //esse método ${$key} faz com que ele busque no banco uma coluna com o nome do conteudo da variavel key 
            }
        }
    }

    require_once(VIEW_PATH . "/{$viewName}.php");
}