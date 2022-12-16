<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCreateRequest extends FormRequest
{
    function attributes() {
        return [
            'name' => 'person name',
            'type' => 'review type',
            'description' => 'info of review',
            'thumbnail' => 'thumbnail of review'
            
        ];
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    function messages() {
        $max = 'The field :attribute cannot have more than :max caracteres';
        $min = 'The field :attribute cannot have less than :min characters';
        $required = 'The field :attribute is required';
        $value = 'The field :attribute only can be book, record or films';

        return [
            'name.max'      => $max,
            'name.min'      => $min,
            'name.required' => $required,
            
            'type.value'      => $value,
            
            
            'thumbnail'         => $required,
            


            'description.max'      => $max,
            'description.min'      => $min,
            'description.required' => $required,

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:30',
            'type' => 'required|in:book,films,record',
            'description' => 'required|min:10|max:3000',
            
        ];
    }
}
