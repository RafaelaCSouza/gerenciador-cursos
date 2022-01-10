<?php

// fazer log de todas as requisições
require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\InterfaceControladorRequisicao;

$caminho = parse_url($_SERVER['REQUEST_URI']);
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho['path'], $rotas)) {
    http_response_code(404);
    exit();
}

$classeControladora = $rotas[$caminho['path']];
/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classeControladora();
$controlador->processaRequisicao();
