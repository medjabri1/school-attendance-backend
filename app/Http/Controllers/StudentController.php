<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Student::orderBy('created_at', 'ASC')->get()->all();
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentById(Student $student)
    {
        //
        return [
            'student' => $student
        ];
    }

    /**
     * Display a listing of 1 level resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLevelStudents(Request $request)
    {
        //
        $level_id = $request->level_id;
        return Student::orderBy('created_at', 'ASC')->where('level_id', $level_id)->get()->all();
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
            'first_name' => 'required',
            'last_name' => 'required',
            'apogee' => 'required',
            'cin' => 'required',
            'cne' => 'required',
            'level_id' => 'required'
        ]);

        return Student::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'apogee' => request('apogee'),
            'cin' => request('cin'),
            'cne' => request('cne'),
            'carte_id' => request('carte_id'),
            'level_id' => request('level_id')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'apogee' => 'required',
            'cin' => 'required',
            'cne' => 'required',
            'carte_id' => 'required',
            'level_id' => 'required'
        ]);

        $success = $student->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'apogee' => request('apogee'),
            'cin' => request('cin'),
            'cne' => request('cne'),
            'carte_id' => request('carte_id'),
            'level_id' => request('level_id')
        ]);

        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $success = $student->delete();

        return [
            'success' => $success
        ];
    }
}
