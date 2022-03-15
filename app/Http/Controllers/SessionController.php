<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Filiere;
use App\Models\Level;
use App\Models\Session;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Session::orderBy('created_at', 'ASC')->paginate(3);

        $sessions = Session::orderBy('created_at', 'DESC')->get()->all();

        $result = [];

        foreach ($sessions as $session) {

            $current_subject = Subject::find($session->subject_id);
            $current_filiere = Filiere::find(Level::find($session->level_id)->filiere_id);

            $current_row = [
                'session_data' => $session,
                'subject_data' => $current_subject,
                'filiere_data' => $current_filiere,
            ];

            array_push($result, $current_row);
        }

        return $result;
    }

    /**
     * Display a listing of 1 resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSessionById(Session $session)
    {
        //
        return [
            'session' => $session
        ];
    }

    /**
     * Display a listing of 1 level resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLevelSessions(Request $request)
    {
        //
        $level_id = $request->level_id;
        return Session::orderBy('created_at', 'ASC')->where('level_id', $level_id)->get()->all();
    }

    /**
     * Display a listing of 1 level resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubjectSessions(Request $request)
    {
        //
        $subject_id = $request->subject_id;
        return Session::orderBy('created_at', 'ASC')->where('subject_id', $subject_id)->get()->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSessionResult(Session $session)
    {
        //

        $level_id = $session->level_id;
        $filiere = Filiere::find(Level::find($level_id)->filiere_id);
        $subject = Subject::find($session->subject_id);

        $total_students = Student::orderBy('last_name', 'ASC')->orderBy('first_name')->where('level_id', $level_id)->get()->all();

        $attended_students = [];
        $absent_students = [];

        $total_attendances = Attendance::where('session_id', $session->id)->get()->all();

        for ($i = 0; $i < count($total_students); $i++) {

            $current_student = $total_students[$i];
            $attended = false;

            $current_attendance = '';

            for ($j = 0; $j < count($total_attendances); $j++) {

                $current_attendance = $total_attendances[$j];

                if ($current_student->id == $current_attendance->student_id) {
                    $attended = true;
                }
            }

            if ($attended == true) {
                array_push($attended_students, [
                    'studentData' => $current_student,
                    'attendanceData' => $current_attendance
                ]);
            } else {
                array_push($absent_students, $current_student);
            }
        }

        return [
            'attended_students' => $attended_students,
            'absent_students' => $absent_students,
            'total_attended' => count($attended_students),
            'total_absent' => count($absent_students),
            'filiere' => $filiere,
            'subject' => $subject,
            'session' => $session
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
            'level_id' => 'required',
            'subject_id' => 'required',
            'salle' => 'required'
        ]);

        return Session::create([
            'level_id' => request('level_id'),
            'subject_id' => request('subject_id'),
            'salle' => request('salle')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
        request()->validate([
            'level_id' => 'required',
            'subject_id' => 'required',
            'salle' => 'required',
        ]);

        $success = $session->update([
            'level_id' => request('level_id'),
            'subject_id' => request('subject_id'),
            'salle' => request('salle')
        ]);

        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $success = $session->delete();

        return [
            'success' => $success
        ];
    }
}
