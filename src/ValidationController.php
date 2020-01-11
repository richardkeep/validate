<?php

namespace Richardkeep\Validate;

use Validator;
use Illuminate\Http\Request;

class ValidationController
{
    public function __invoke(Request $request)
    {
        $field = preg_replace('/-/', '_', $request->field);

        return json_encode(
                Validator::make([
                    "{$field}" => $request->data
                ], config('richard.rules'))
                ->errors()
                ->first($field)
            );
    }
}
