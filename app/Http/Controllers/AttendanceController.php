<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Attendance::orderBy('created_at', 'DESC')->get()->all();
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAttendanceById(Attendance $attendance)
    {
        return [
            'attendance' => $attendance
        ];
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSessionAttendances(Request $request)
    {
        //
        $session_id = $request->session_id;
        return Attendance::orderBy('created_at', 'ASC')->where('session_id', $session_id)->get()->all();
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentAttendances(Request $request)
    {
        //
        $student_id = $request->student_id;
        return Attendance::orderBy('created_at', 'ASC')->where('student_id', $student_id)->get()->all();
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
            'student_id' => 'required',
            'session_id' => 'required'
        ]);

        return Attendance::create([
            'student_id' => request('student_id'),
            'session_id' => request('session_id')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
        request()->validate([
            'student_id' => 'required',
            'session_id' => 'required'
        ]);

        $success = $attendance->update([
            'student_id' => request('student_id'),
            'session_id' => request('session_id')
        ]);

        return [
            'success' => $success,
            'attendance' => $attendance
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
        $success = $attendance->delete();

        return [
            'success' => $success
        ];
    }
}
