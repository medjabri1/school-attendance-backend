<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        return Filiere::orderBy('created_at', 'ASC')->get()->all();
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFiliereById(Filiere $filiere)
    {
        // 
        return [
            'filiere' => $filiere
        ];
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
            'name' => 'required'
        ]);

        return Filiere::create([
            'name' => request('name')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        //
        request()->validate([
            'name' => 'required'
        ]);

        $success = $filiere->update([
            'name' => request('name')
        ]);

        return [
            'success' => $success,
            'filiere' => $filiere
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filiere $filiere)
    {
        //
        $success = $filiere->delete();

        return [
            'succes' => $success
        ];
    }
}
