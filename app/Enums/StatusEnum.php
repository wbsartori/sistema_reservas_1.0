<?php

namespace App\Enums;

enum StatusEnum: string
{

    case ATIVO = 'ativo';
    case INATIVO = 'inativo';
    case APROVADO = 'aprovado';
    case NEGADO = 'negado';
    case AGUARDANDO = 'aguardando';
    case FINALIZADO = 'finalizado';
    case CANCELADO = 'cancelado';
}
