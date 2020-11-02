<?php

namespace App\Http\Requests;

use App\Domain\Contracts\DataContract;
use Illuminate\Foundation\Http\FormRequest;

class CreateDataRequest extends FormRequest
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
            DataContract::FIELD_AGENDA => 'required|string|max:50|min:3',
            DataContract::FIELD_TOPIC  => 'required|string|min:3|max:50',
            DataContract::FIELD_TEXT   => 'required|string|min:3|max:150'
        ];
    }

    public function attributes()
    {
        return [
            DataContract::FIELD_AGENDA => 'incorrect agenda',
            DataContract::FIELD_TOPIC  => 'incorrect topic',
            DataContract::FIELD_TEXT   => 'incorrect text'
        ];
    }
}
