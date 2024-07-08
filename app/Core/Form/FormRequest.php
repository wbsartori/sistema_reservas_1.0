<?php

namespace App\Core\Form;

class FormRequest
{
    public static function make(): FormRequest
    {
        return new self();
    }

    /**
     * @param array $post
     * @return object
     */
    public function validate(array $post): object
    {
        $data = [];
        if (isset($post['id'])) {
            $data['id'] = filter_input($post['id'], 'id', FILTER_SANITIZE_NUMBER_INT);
        }
        foreach ($post as $key => $value) {
            if (gettype($key) === 'string') {
                $data[] = filter_var($key, FILTER_SANITIZE_STRING);
            }
        }
        return (object)$data;
    }
}
