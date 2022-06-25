<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubjectOfferingScheduleRequest extends FormRequest
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
            'subject_offering_id' =>  [
                'required', 
                    Rule::unique("subject_offering_schedules")->where(
                        function ($query) {
                            return $query->where([
                                ["instructor_id", "=", $this->instructor_id],
                                ["room_id", "=", $this->room_id],
                                ["days", "=", $this->days],
                                ["time_start", "=", $this->time_start],
                                ["time_end", "=", $this->time_end]
                            ]);
                        }
                    )
                ],
            'instructor_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'days' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ];
    }
}
