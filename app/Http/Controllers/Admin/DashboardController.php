<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Goals;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        // Get the authenticated user
        $user = auth()->user();

        // Calculate total expenses for the authenticated user
        $totalExpenses = $user->expenses()->sum('amount');

        // Calculate total income for the authenticated user
        $totalIncome = $user->incomes()->sum('amount');

        // Get a list of expenses for the authenticated user with formatted dates
        $unformattedExpenses = $user->expenses()->select('title', 'description', 'amount', 'created_at')->get();
        $expenses = $unformattedExpenses->map(function ($expense) {
            $expense['date'] = Carbon::parse($expense['created_at'])->format('d/m/y');
            return $expense;
        });

        // Get a list of incomes for the authenticated user with formatted dates
        $unformattedIncomes = $user->incomes()->select('title', 'description', 'amount', 'created_at')->get();
        $incomes = $unformattedIncomes->map(function ($income) {
            $income['date'] = Carbon::parse($income['created_at'])->format('d/m/y');
            return $income;
        });

        // Calculate balance (expenses - income)
        $balance = $totalIncome - $totalExpenses;

        // Get the current month number
        $currentMonth = Carbon::now()->format('n');

        // Create a bar chart
        $pieChart = app()->chartjs
            ->name('pieChart')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Total Expenses', 'Total Income'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => [$totalExpenses, $totalIncome],
                ],
            ])
            ->options([]);

        return view('admin.dashboard', compact(
            'title',
            'pieChart',
            'totalExpenses',
            'totalIncome',
            'expenses',
            'incomes',
            'balance'
        ));
    }
}
