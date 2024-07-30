<?php

namespace App\Validator;

use App\Core\View;
use App\Enums\StatusEnum;

class StatusValidator
{
    /**
     * @param string $type
     * @return string
     */
    public static function validateStatus(string $type): string
    {
        if($type === 'create') {
            return StatusEnum::ATIVO->value;
        }else if($type === 'create_reservation') {
            return StatusEnum::AGUARDANDO->value;
        }
    }
}
