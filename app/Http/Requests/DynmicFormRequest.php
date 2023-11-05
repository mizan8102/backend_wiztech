<?php

namespace App\Http\Requests;

use App\Models\Dynamicform;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DynmicFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'questions' => 'array',
            'questions.*.data' => 'present',
            'questions.*.label' => 'required',
            'questions.*.type' => ['required', Rule::in([
                Dynamicform::TYPE_TEXT,
                Dynamicform::TYPE_TEXTAREA,
                Dynamicform::TYPE_SELECT,
                Dynamicform::TYPE_RADIO,
                Dynamicform::TYPE_CHECKBOX,
                Dynamicform::TYPE_DATE,
                Dynamicform::TYPE_TIME,
            ])],

        ];
    }
}
