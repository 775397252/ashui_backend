<?php

namespace App\Http\Requests\Background;

use App\Http\Requests\Request;
use App\Models\Background\AshuiConfession;

class UpdateAshuiConfessionRequest extends Request
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
        return AshuiConfession::$rules;
    }
}
