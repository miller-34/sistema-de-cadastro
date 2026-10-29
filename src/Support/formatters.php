<?php

declare(strict_types=1);

function formatar_data(string $data): string
{
    return implode('/', array_reverse(explode('-', $data)));
}

function formatar_telefone(string $telefone): string
{
    $ddd = substr($telefone, 0, 2);
    $parte1 = substr($telefone, 2, 5);
    $parte2 = substr($telefone, 7);

    return "($ddd) $parte1-$parte2";
}
