<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

use Illuminate\Support\Carbon;


class IncomeController extends Controller
{
    public function index()
    {
        $title = 'Income';

        // Get the authenticated user
        $user = auth()->user();

        // Calculate total income for the authenticated user
        $totalIncome = $user->incomes()->sum('amount');

        // Get a list of incomes for the authenticated user with formatted dates
        $unformattedIncomes = $user->incomes()->select('id', 'title', 'description', 'amount', 'created_at')->get();
        $incomes = $unformattedIncomes->map(function ($income) {
            $income['date'] = Carbon::parse($income['created_at'])->format('d/m/y');
            return $income;
        });

        // Get the current month number
        $currentMonth = Carbon::now()->format('n');

        return view('admin.income', compact(
            'title',
            'totalIncome',
            'incomes',
        ));
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Use the authenticated user to associate the income
        auth()->user()->incomes()->create($request->all());

        return redirect()->route('incomes')->with('success', 'Income added successfully');
    }

    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
    }

    public function edit($id)
    {
        // You should replace 'your.edit.view' with the actual view for editing
        return view('your.edit.view', compact('income'));
    }

    public function update(Request $request, $id)
    {
        $income = auth()->user()->incomes()->findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $income->update($request->all());

        return redirect()->route('incomes')->with('success', 'Income updated successfully');
    }

    public function delete($id)
    {
        $income = auth()->user()->incomes()->findOrFail($id);

        $income->delete();

        return redirect()->route('incomes')->with('success', 'Income deleted successfully');
    }
}
