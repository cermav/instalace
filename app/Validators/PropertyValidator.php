<?php
/**
 * Created by PhpStorm.
 * User: petr
 * Date: 28.11.2019
 * Time: 17:02
 */

namespace App\Validators;


use Illuminate\Support\Facades\Validator;

class PropertyValidator
{
    public static function create(array $data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|int'
        ]);

        return $validator;
    }

}