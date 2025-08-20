<?php

// Define uma classe endereco
class Endereco
{
    // Atributos do endereco
    public $rua;
    public $bairro;
    public $cidade;

    // Construtor
    public function __construct($rua, $bairro, $cidade)
    {
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
    }
}

// Pega o CEP do form
$cep = $_GET['cep'] ?? '';

// Verifica se o CEP é conhecido
if ($cep == '38400-100') {
    // Cria um novo objeto com o CEP encontrado
    $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
} elseif ($cep == '38400-200') {
    // Cria um novo objeto com o CEP encontrado
    $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
} else {
    // Cria um objeto vazio
    $endereco = new Endereco('', '', '');
}

// Define o Content-type para json para tratar os dados devidamente
header('Content-type: application/json');

// Devolve o objeto
echo json_encode($endereco);
