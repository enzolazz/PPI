<?php

class Usuario
{
    public $email;
    public $senha;

    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    public function SalvaEmArquivo()
    {
        // Abre o arquivo de texto para escrita de conteúdo no final
        $arq = fopen('usuarios.txt', 'a');

        // Neste exemplo os dados são armazenados de maneira simplificada,
        // no formato textual com campos separados por dois ponto-e-vírgula.
        fwrite($arq, "{$this->email};{$this->senha}\n");

        // Fecha o arquivo de texto.
        fclose($arq);
    }
}

// Carrega as informações dos contatos do arquivo de texto
// e retorna um array de objetos correspondente
function carregaUsuariosArquivo()
{
    $arrayUsuarios = [];

    // Abre o arquivo contatos.txt para leitura
    $arq = fopen('usuarios.txt', 'r');
    if (! $arq) {
        return $arrayUsuarios;
    }

    // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
    while (! feof($arq)) {
        // fgets lê uma linha de texto do arquivo, mas traz junto a quebra de linha (/n) no final, se houver
        // a função trim elimina caracteres em branco (inclusive /n) do início e do final da string
        $usuario = trim(fgets($arq));

        if ($usuario != '') {
            // Separa dados na linha utilizando o ';' como separador
            [$email,  $senha] = array_pad(explode(';', $usuario), 2, null);

            // Cria novo objeto representado o contato e adiciona no final do array
            $novoUsuario = new Usuario($email, $senha);
            $arrayUsuarios[] = $novoUsuario;
        }
    }

    // Fecha o arquivo
    fclose($arq);

    return $arrayUsuarios;
}
