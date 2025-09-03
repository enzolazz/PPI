<?php

// Funcao que checa sessao, caso nao exista, redireciona o usuario ao index.html
function exitWhenNotLoggedIn()
{
    if (! isset($_SESSION['loggedIn'])) {
        header('Location: index.html');
        exit();
    }
}
