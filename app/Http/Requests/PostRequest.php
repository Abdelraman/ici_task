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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'sometimes|nullable',
            'parent_id' => 'sometimes|nullable',
            'text' => 'required',
            'image' => 'sometimes|nullable',
            'user_image_id' => 'sometimes|nullable',
        ];

    }//end of rules

    public function prepareForValidation()
    {
        return $this->merge([
            'user_id' => auth()->user() ? auth()->user()->id : null
        ]);

    }// end of prepareForValidation

}//end of request
