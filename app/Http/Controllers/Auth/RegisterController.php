<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Job_role;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                'name' => ['required', 'string', 'max:100', 'min:2'],
                'surname' => ['required', 'string', 'max:100', 'min:2'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'region' => ['required', 'string'],
                'level' => ['required', 'string'],
            ],
            [
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
                'email.unique' => 'Hai giá un account?',
                'password.required' => 'Password obbligatoria',
                'password.min' => 'Almeno :min caratteri',
                'password.confirmed' => 'Le password non corrispondono',
                'region.required' => 'Campo obbligatorio',
                'region.string' => 'Deve contenere solo testo',
                'level.required' => 'Campo obbligatorio',
                'level.string' => 'Deve contenere solo testo',
                
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $new_user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'region' => $data['region'],
            'level' => $data['level'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if (array_key_exists('job_roles', $data)) {
            $new_user->job_roles()->attach($data['job_roles']);
        }

        return $new_user;
    }

    public function showRegistrationForm()
    {
        $regions = [
            'Abruzzo',
            'Basilicata',
            'Calabria',
            'Campania',
            'Emilia-Romagna',
            'Friuli Venezia Giulia',
            'Lazio',
            'Liguria',
            'Lombardia',
            'Marche',
            'Molise',
            'Piemonte',
            'Puglia',
            'Sardegna',
            'Sicilia',
            'Toscana',
            'Trentino-Alto Adige',
            'Valle d Aosta',
            'Veneto',
        ];

        $levels = ['Junior', 'Middle', 'Senior'];

        $job_roles = Job_role::orderBy('name', 'asc')->get();

        return view('auth.register', compact('regions', 'levels', 'job_roles'));
    }
}
