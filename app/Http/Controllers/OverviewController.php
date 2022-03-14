<?php

namespace App\Http\Controllers;

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
        return [
            'subject' => $subject,
            'sessions' => Session::where('subject_id', $subject->id)->get()->all()
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
