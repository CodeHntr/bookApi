<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends BasicRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'pages' => 'required|numeric',
            'authorFirstName' => 'required|string',
            'authorLastName' => 'required|string',
            'authorAge' => 'required|numeric',
            'authorCountry' => 'required|string',
            'publisherName' => 'required|string',
            'publisherCountry' => 'required|string',
            'rating' => 'required|numeric',
        ];
    }
}
