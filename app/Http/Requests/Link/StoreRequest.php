<?php

    namespace App\Http\Requests\Link;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreRequest extends FormRequest
    {
        public function rules(): array
        {
            return [
                'url' => 'url|required',
            ];
        }

        public function authorize(): bool
        {
            return true;
        }
    }