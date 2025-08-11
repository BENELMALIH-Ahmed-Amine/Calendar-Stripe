<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('calendar.calendar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();

        $courses = $courses->map(function ($course) {
            return [
                'id' => $course->id,
                'owner' => $course->user_id,
                "start" => $course->storeStart,
                "end" => $course->storeEnd,
                "title" => $course->title,
                "backgroundColor" => "bleu"
            ];
        });

        return response()->json([
            "events" => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "storeStart" => "required",
            "storeEnd" => "required",
            "title" => "required"
        ]);

        Course::create([
            "storeStart" => $request->storeStart,
            "storeEnd" => $request->storeEnd,
            "title" => $request->title,
            'user_id' => Auth::user()->id
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}
