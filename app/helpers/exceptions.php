<?php

function formatException(Throwable $throw) 
{
    echo '<pre>';
    print_r("<b>Erro no arquivo:</b> {$throw->getFile()}\n<b>Na linha:</b> {$throw->getLine()}\n<b>Mensagem:</b> {$throw->getMessage()}");
    echo '</pre>';

}