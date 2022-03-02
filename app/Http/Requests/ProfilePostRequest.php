<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePostRequest extends FormRequest
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
            'name' => 'required|string|max:100|min:2',
            'surname' => 'required|string|max:100|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'region' => 'required|string',
            'level' => 'required|string',
            'avatar_path' => 'nullable|image|max:32000',
            'cv_path' => 'nullable|mimes:jpeg,png,pdf|max:32000',
            'description' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obbligatorio',
            'name.string' => 'Non sono ammessi numeri',
            'name.max' => 'Massimo :max caratteri',
            'name.min' => 'Almeno :min caratteri',
            'surname.required' => 'Campo obbligatorio',
            'surname.string' => 'Non sono ammessi numeri','surname.max' => 'Massimo :max caratteri',
            'surname.min' => 'Almeno :min caratteri',
            'email.required' => 'Campo obbligatorio',
            'email.email' => 'Email non valida',
            'email.max' => 'Massimo :max caratteri',
            'email.unique' => 'Email giá registrata',
            'region.required' => 'Campo obbligatorio',
            'region.string' => 'Deve contenere solo testo',
            'level.required' => 'Campo obbligatorio',
            'avatar_path.image' => 'Puoi inserire solo immagini',
            'avatar_path.max' => 'L\'immagine supera i :max KB',
            'cv_path.mimes' => 'I file supportati sono: .jpeg, .png, .pdf',
            'cv_path.max' => 'Il file supera i :max KB',
            'description.string' => 'Testo non valido',
            'description.max' => 'Massimo :max caratteri',
        ];
    }
}
