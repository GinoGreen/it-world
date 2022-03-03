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
            'email' => 'required|string|email|max:255',
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
            'name.required' => 'Nome obbligatorio',
            'name.string' => 'Non sono ammessi numeri nel nome',
            'name.max' => 'Nome di massimo :max caratteri',
            'name.min' => 'Nome di almeno :min caratteri',
            'surname.required' => 'Cognome obbligatorio',
            'surname.string' => 'Non sono ammessi numeri',
            'surname.max' => 'Massimo :max caratteri nel cognome',
            'surname.min' => 'Cognome di almeno :min caratteri',
            'email.required' => 'Email obbligatorio',
            'email.email' => 'Email non valida',
            'email.max' => 'Email di massimo :max caratteri',
            'email.unique' => 'Email giá registrata',
            'region.required' => 'Seleziona una regione',
            'region.string' => 'La regione deve contenere solo testo',
            'level.required' => 'Esperienza obbligatoria',
            'avatar_path.image' => 'L\'avatar deve essere un immagine',
            'avatar_path.max' => 'L\'immagine supera i :max KB',
            'cv_path.mimes' => 'Il CV deve essere .jpeg, .png o .pdf',
            'cv_path.max' => 'Il CV supera i :max KB',
            'description.string' => 'Testo non valido',
            'description.max' => 'Descrizione di massimo :max caratteri',
        ];
    }
}
