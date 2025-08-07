<?php

class Cliente
{
    public $nome;
    public $email;
    public $cpf;
    public $hashSenha;
    public $cep;
    public $rua;
    public $bairro;
    public $cidade;
    public $estado;

    public function __construct($nome, $email, $cpf, $senha, $cep, $rua, $bairro, $cidade, $estado)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->hashSenha = $senha;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function SalvaEmArquivo()
    {
        // Abre o arquivo de texto para escrita de conteúdo no final
        $arq = fopen('clientes.txt', 'a');

        // Neste exemplo os dados são armazenados de maneira simplificada,
        // no formato textual com campos separados por dois ponto-e-vírgula.
        fwrite($arq, "{$this->nome};{$this->email};{$this->cpf};{$this->hashSenha};{$this->cep};{$this->rua};{$this->bairro};{$this->cidade};{$this->estado}\n");

        // Fecha o arquivo de texto.
        fclose($arq);
    }
}

// Carrega as informações dos contatos do arquivo de texto
// e retorna um array de objetos correspondente
function carregaClientesDeArquivo()
{
    $arrayClientes = [];

    // Abre o arquivo contatos.txt para leitura
    $arq = fopen('clientes.txt', 'r');
    if (! $arq) {
        return $arrayClientes;
    }

    // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
    while (! feof($arq)) {
        // fgets lê uma linha de texto do arquivo, mas traz junto a quebra de linha (/n) no final, se houver
        // a função trim elimina caracteres em branco (inclusive /n) do início e do final da string
        $cliente = trim(fgets($arq));

        if ($cliente != '') {
            // Separa dados na linha utilizando o ';' como separador
            list($nome, $email, $cpf, $hashSenha, $cep, $rua, $bairro, $cidade, $estado) = array_pad(explode(';', $cliente), 9, null);

            // Cria novo objeto representado o contato e adiciona no final do array
            $novoCliente = new Cliente($nome, $email, $cpf, $hashSenha, $cep, $rua, $bairro, $cidade, $estado);
            $arrayClientes[] = $novoCliente;
        }
    }

    // Fecha o arquivo
    fclose($arq);

    return $arrayClientes;
}
