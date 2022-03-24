<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Filiere;
use App\Models\Level;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Professor;
use App\Models\Session;

class OverviewController extends Controller
{
    /**
     * GLOBAL OVERVIEW
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        return [
            'total_sessions' => Session::all()->count(),
            'total_students' => Student::all()->count(),
            'total_subjects' => Subject::all()->count(),
            'total_filieres' => Filiere::all()->count(),
            'total_professors' => Professor::all()->count(),
            'total_levels' => Level::all()->count()
        ];
    }

    /**
     * LEVEL OVERVIEW
     *
     * @return \Illuminate\Http\Response
     */
    public function levelOverview(Level $level)
    {
        return [
            'level' => $level,
            'filiere' => Filiere::find($level->filiere_id),
            'total_sessions' => Session::where('level_id', $level->id)->count(),
            'total_students' => Student::where('level_id', $level->id)->count(),
            'total_subjects' => Subject::where('level_id', $level->id)->count(),
        ];
    }

    /**
     * SUBJECT OVERVIEW
     *
     * @return \Illuminate\Http\Response
     */
    public function subjectOverview(Subject $subject)
    {

        $sessions_initial = Session::where('subject_id', $subject->id)->get()->all();
        $sessions_final = [];

        foreach ($sessions_initial as $session) {
            $current_classroom = Classroom::find($session->classroom_id);
            array_push(
                $sessions_final,
                [
                    'session' => $session,
                    'classroom' => $current_classroom
                ]
            );
        }

        return [
            'subject' => $subject,
            'sessions' => $sessions_final,
            'professor' => $subject->professor_id != null ? Professor::find($subject->professor_id) : null
        ];
    }

    /**
     * SESSIONS OVERVIEW
     *
     * @return \Illuminate\Http\Response
     */
    public function sessionsOverview()
    {

        $sessions_stats = Session::selectRaw('COUNT(*) as nbr, DATE_FORMAT(created_at, "%d-%m") as date')
            ->groupBy('date')->limit(7)->get()->all();

        return [
            'sessions_stats' => $sessions_stats
        ];
    }
}
