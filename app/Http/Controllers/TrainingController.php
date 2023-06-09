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
                'training-end-at' => 'required',
                'training-start-at' => 'required',
            ]
        );

        $training = new Training();
        $training->name = $request->input('training-name');
        $training->description = $request->input('training-description');
        $training->profit_carbon_score = $request->input('training-profit-carbon-score');
        $training->end_at = new DateTime($request->input('training-end-at'));
        $training->start_at = new DateTime($request->input('training-start-at'));

        $training->save();

        return redirect()->route('training-list');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
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
