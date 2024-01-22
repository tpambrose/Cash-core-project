<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Expense;
use Illuminate\Support\Carbon;

class ExpenseController extends Controller
{
    public function index()
    {
        $title = 'Expense';

        // Get the authenticated user
        $user = auth()->user();

        // Calculate total expense for the authenticated user
        $totalExpense = $user->expenses()->sum('amount');

        // Get a list of expenses for the authenticated user with formatted dates
        $unformattedExpenses = $user->expenses()->select('id', 'title', 'description', 'amount', 'created_at')->get();
        $expenses = $unformattedExpenses->map(function ($expense) {
            $expense['date'] = Carbon::parse($expense['created_at'])->format('d/m/y');
            return $expense;
        });

        // Get the current month number
        $currentMonth = Carbon::now()->format('n');

        return view('admin.expenses', compact(
            'title',
            'totalExpense',
            'expenses',
        ));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Use the authenticated user to associate the expense
        auth()->user()->expenses()->create($request->all());

        return redirect()->route('expenses')->with('success', 'Expense added successfully');
    }

    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $expense = auth()->user()->expenses()->findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses')->with('success', 'Expense updated successfully');
    }

    public function delete($id)
    {
        $expense = auth()->user()->expenses()->findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses')->with('success', 'Expense deleted successfully');
    }
}
