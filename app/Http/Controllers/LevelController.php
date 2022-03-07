<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Level::orderBy('created_at', 'ASC')->get()->all();
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLevelById(Level $level)
    {
        //
        return [
            'level' => $level
        ];
    }

    /**
     * Display a listing of 1 Filiere resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFiliereLevels(Request $request)
    {
        //
        $filiere_id = $request->filiere_id;
        return Level::orderBy('created_at', 'ASC')->where('filiere_id', $filiere_id)->get()->all();
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
        request()->validate([
            'libelle' => 'required',
            'filiere_id' => 'required'
        ]);

        return Level::create([
            'libelle' => request('libelle'),
            'filiere_id' => request('filiere_id')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        //
        request()->validate([
            'libelle' => 'required',
            'filiere_id' => 'required'
        ]);

        $success = $level->update([
            'libelle' => request('libelle'),
            'filiere_id' => request('filiere_id')
        ]);

        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        //
        $success = $level->delete();

        return [
            'success' => $success
        ];
    }
}
