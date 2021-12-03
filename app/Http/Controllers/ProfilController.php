<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard/profil/index', compact('user'));
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
     * @param  \App\Http\Requests\StoreProfilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.profil.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilRequest  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'alamat' => '',
            'institusi' => '',
            'no_hp' => '',
            'description' => ''
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image'
            ]);
            $file = $request->file('photo');
            $folder_tujuan = 'img/people';
            $filename = time() . '_' . $file->getClientOriginalName();
            $filepath = $file->move($folder_tujuan, $filename);
            if($user->photo != 'img/people/default.jpg'){
                File::delete($user->photo);
            }
            $user->update([
                'photo' => $filepath
            ]);
        }
        $user->update($validated);
        return redirect('/dashboard/profil')->with('success', 'Profil berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }

    public function remove_photo(Request $request)
    {
        $user = User::find($request->user_id);
        if($user->photo != 'img/people/default.jpg'){
            File::delete($user->photo);
            $user->update([
                'photo' => 'img/people/default.jpg'
            ]);
        }
        return redirect('/dashboard/profil');
    }
}
