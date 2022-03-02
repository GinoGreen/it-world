<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Job_role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($profile,User $user)
    {
        $profile=Auth::user();
        
        $fields = ['name', 'surname', 'region', 'email', 'avatar_path', 'cv_path', 'level'];
     
        return view('admin.profile.show',compact('profile','fields'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
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

        return redirect()->route('admin.profile.show', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $profile)
    {
       
        $profile->delete();
        return redirect()->route('home')->with('deleted','Profilo eliminato');
    }


}
