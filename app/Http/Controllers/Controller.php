<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

abstract class Controller
{
    public function sendResponse(
        $code,
        $result = null,
        $errors = null,
        $localError = null
    ) {
        $newErrors = null;
        if ($code === 200) {
            $message = 'success';
        } else {
            if (is_array($errors)) {
                foreach ($errors as $key => $value) {
                    $newErrors[] = ['key' => $key, 'description' => $value];
                }
            }
            $message = 'error';
        }
        $err = null;
        if ($localError > 0) {
            $err = 'ERR' . $localError;
        }
        $response = [
            'code' => $code,
            'error' => [
                'message' => $message,
                'errors' => $newErrors,
                'errorLocalCode' => $err
            ],
            'data' => $result
        ];
        return new Response($response, $code);
    }
}
