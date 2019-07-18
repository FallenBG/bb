<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return Gate::allows('update', $this->route('project'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Request::validate([
            // TODO: Read more about sometimes validation
//            'title'         => ['sometimes|required', 'min:3'],
            'title'         => ['required', 'min:3'],
            'description'   => ['max:2500', 'min:3']
        ]);

        $attributes['owner_id'] = auth()->id();
    }
}
