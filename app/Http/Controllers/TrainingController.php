<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Date;
use DateTime;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::paginate(5);
        return view('training/training-list', ['trainings' => $trainings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('training/training-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'training-name' => 'required',
                'training-description' => 'required',
                'training-profit-carbon-score' => 'required',
                'training-duration-d' => 'required',
                'training-duration-h' => 'required',
                'training-duration-m' => 'required',
            ]
        );

        $days = (int) $request->input('training-duration-d') * 24 * 60 * 60;
        $hours = (int) $request->input('training-duration-h') * 60 * 60;
        $minutes = (int) $request->input('training-duration-m') * 60;

        $duration = $days + $hours + $minutes;

        $training = new Training();
        $training->name = (string) $request->input('training-name');
        $training->description = (string) $request->input('training-description');
        $training->profit_carbon_score = (int) $request->input('training-profit-carbon-score');
       $training->duration = $duration;

        $training->save();

        return redirect()->route('training-list');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        return view('training/training-show', ['training' => $training]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
    }
}
