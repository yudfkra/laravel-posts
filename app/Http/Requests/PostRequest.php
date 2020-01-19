<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auth_check = auth()->check();

        if ($auth_check && $this->isMethod('put')) {
            return $this->route('post')->isOwnUser($this->user());
        }

        return $auth_check;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:80',
            'body' => 'required|string',
        ];
    }
}
