<?php

namespace App\Validator;

enum ProfileStatus: string
{
    case ADMINISTRADOR = 'administrador';
    case USUARIO = 'usuario';
}
