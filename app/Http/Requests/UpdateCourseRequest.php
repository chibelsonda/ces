<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateCourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 
                Rule::unique("courses")->where(
                    function ($query) {
                        return $query->where([
                            ["name", "=", $this->name],
                            ["description", "=", $this->description],
                            ["id", "<>", $this->id]
                        ]);
                    }
                )
            ],
            'description' => 'required'
        ];
    }
}
