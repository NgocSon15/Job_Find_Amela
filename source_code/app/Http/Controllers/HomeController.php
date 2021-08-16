<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skill;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function getHome()
    {
        $jobs = Job::orderByDesc('created_at')->limit(5)->get();
        return view('frontend.home', compact('jobs'));
    }

    public function getListJob()
    {
        Carbon::setLocale('vi');
        $jobs = Job::paginate(6);
        $skills = Skill::all();
        $now = Carbon::now();
        return view('job_listing', compact('jobs', 'now', 'skills'));

    }
    public function filterJob()
    {
        
    }

//    public function filter(Request $request)
//    {
//        $type_id = $request->input('type_id');
//        $noteFilter = NoteType::findOrFail($type_id);
//        $notes = Note::where('type_id', $noteFilter->id)->paginate(1);
//        $totalNote = count($notes);
//        $note_type = NoteType::all();
//        return view('note_type.list', compact('notes', 'note_type', 'totalNote', 'noteFilter'));
//    }




}
