<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePostRequest;
use App\Job_role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    
    public function show()
    {
        $profile = Auth::user();
        
        $fields = ['name', 'surname', 'region', 'email', 'avatar_path', 'cv_path', 'level', 'description'];
     
        return view('admin.profile.show', compact('profile','fields'));
    }

    public function edit()
    {
        $profile = Auth::user();

        if ($profile) {

            $levels = ['Junior', 'Middle', 'Senior'];

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

            $job_roles = Job_role::orderBy('name', 'asc')->get();
            
            return view('admin.profile.edit', compact('profile', 'regions', 'levels', 'job_roles'));
        }
        abort(404, 'Profile non trovato o inesistente');
    }

    
    public function update(ProfilePostRequest $request, User $profile)
    {

        $profile = Auth::user();

        $form_data = $request->all();
        
        // setting immagine profilo
        if (array_key_exists('avatar_path', $form_data)) {
            
            if ($profile->avatar_path) {
                Storage::delete($profile->avatar_path);
            }

            $avatar_path = Storage::put('upload', $form_data['avatar_path']);
            $form_data['avatar_path'] = $avatar_path;
        }
        // setting cv profilo
        if (array_key_exists('cv_path', $form_data)) {
            
            if ($profile->cv_path) {
                Storage::delete($profile->cv_path);
            }

            $cv_path = Storage::put('upload', $form_data['cv_path']);
            $form_data['cv_path'] = $cv_path;
        }

        //////  UPDATING DATA   //////
        $profile->update($form_data);

        //setting job_roles
        if (array_key_exists('job_roles', $form_data)) {
            $profile->job_roles()->sync($form_data['job_roles']);
        } else {
            $profile->job_roles()->detach();
        }

        return redirect()->route('admin.show', $profile);
    }

    public function destroy(User $profile)
    {
        $profile = Auth::user();

        $profile->delete();

        return redirect()->route('home')->with('deleted','Profilo eliminato');
    }

}
