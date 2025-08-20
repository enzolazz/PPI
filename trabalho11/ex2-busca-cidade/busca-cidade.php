<?php

// Pega o CEP do form
$cep = $_GET['cep'] ?? '';

// Verifica se o form inserido é algum conhecido
if ($cep == '38400-100') {
    // Devolve o CEP como Uberlândia, é aqui que o xhr.responseText acha o CEP
    echo 'Uberlândia';
 elseif ($cep == '38700-000') {
    // Devolve o CEP como Patos de Minas, é aqui que o xhr.responseText acha o CEP
    echo 'Patos de Minas';
} else {
    // Nao achou o CEP, devolve status CODE 404.
    http_response_code(404);
    // Devolve o CEP como nao disponivel;
    echo "{$cep} is not available";
}
