<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goals;

class MonthlyGoalController extends Controller
{
    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'month' => 'required|integer',
        ]);

        Goals::create($request->all());

        return redirect()->route('goals.index')->with('success', 'Goal added successfully');
    }

    public function show($month)
    {
        $goal = Goals::where('month', $month)->firstOrFail();
        return view('goals.show', compact('goal'));
    }

    public function edit($month)
    {
        $goal = Goals::where('month', $month)->firstOrFail();
        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, $month)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $goal = Goals::where('month', $month)->firstOrFail();
        $goal->update(['amount' => $request->amount]);

        return redirect()->route('goals.index')->with('success', 'Goal updated successfully');
    }
}
