<?php

namespace App\Http\Requests;

use App\Domain\Contracts\DataContract;
use Illuminate\Foundation\Http\FormRequest;

class GetDataRequest extends FormRequest
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
            DataContract::FIELD_UUID => 'required|uuid'
        ];
    }
}
