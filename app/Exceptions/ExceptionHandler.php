<?php

namespace App\Exceptions;
use Illuminate\Validation\ValidationException;

use Exception;

class ExceptionHandler extends Exception
{
    protected function invalidJson($request, ValidationException $exception)
    {
        $errors = [];
        foreach ($exception->errors() as $field => $messages) {
            foreach ($messages as $message) {
                $errors[] = [
                    'code' => $field,
                    'message' => $message,
                ];
            }
        }

        return response()->json([
            'error' => $errors,
        ], $exception->status);
    }
}
