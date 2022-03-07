<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Subject::orderBy('created_at', 'ASC')->get()->all();
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubjectById(Subject $subject)
    {
        //
        return [
            'subject' => $subject
        ];
    }

    /**
     * Display a listing of 1 level resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLevelSubjects(Request $request)
    {
        //
        $level_id = $request->level_id;
        return Subject::orderBy('created_at', 'ASC')->where('level_id', $level_id)->get()->all();
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
            'name' => 'required',
            'level_id' => 'required'
        ]);

        return Subject::create([
            'name' => request('name'),
            'level_id' => request('level_id')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        request()->validate([
            'name' => 'required',
            'level_id' => 'required'
        ]);

        $success = $subject->update([
            'name' => request('name'),
            'level_id' => request('level_id')
        ]);

        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $success = $subject->delete();

        return [
            'success' => $success
        ];
    }
}
